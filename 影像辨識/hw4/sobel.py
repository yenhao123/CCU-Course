import os
import cv2
import numpy as np
import matplotlib.pyplot as plt

def sobel(img):
    '''
    1. count gx,gy
    2. count gx+gy
    3. over ts = 1
    '''
    h,w,d = img.shape
    print(h,w,d)
    x_filter = np.array([[-1,-2,-1],[0,0,0],[1,2,1]])
    y_filter = np.array([[-1,0,1],[-2,0,2],[-1,0,1]])
    output = np.zeros([h-2,w-2,d])
    for channel in range(d):
        for y in range(1,h-1):
            for x in range(1,w-1):
                #count gx,gy
                gx = (x_filter[0,0]*img[y-1,x-1,channel]+\
                        x_filter[0,1]*img[y-1,x,channel]+\
                        x_filter[0,2]*img[y-1,x+1,channel]+\
                        x_filter[1,0]*img[y,x-1,channel]+\
                        x_filter[1,1]*img[y,x,channel]+\
                        x_filter[1,2]*img[y,x+1,channel]+\
                        x_filter[2,0]*img[y+1,x-1,channel]+\
                        x_filter[2,1]*img[y+1,x,channel]+\
                        x_filter[2,2]*img[y+1,x+1,channel])
                
                gy = (y_filter[0,0]*img[y-1,x-1,channel]+\
                        y_filter[0,1]*img[y-1,x,channel]+\
                        y_filter[0,2]*img[y-1,x+1,channel]+\
                        y_filter[1,0]*img[y,x-1,channel]+\
                        y_filter[1,1]*img[y,x,channel]+\
                        y_filter[1,2]*img[y,x+1,channel]+\
                        y_filter[2,0]*img[y+1,x-1,channel]+\
                        y_filter[2,1]*img[y+1,x,channel]+\
                        y_filter[2,2]*img[y+1,x+1,channel])
                #gx+gy
                g = abs(gx) + abs(gy)
                #output
                output[y-1,x-1,channel] = g

    rgb_edge = output[:,:,0] + output[:,:,1] + output[:,:,2]
    return rgb_edge

def imgplot(f,img,rgb_edge):
        
    outpath = 'output/' + f
    #save
    plt.imsave(outpath,rgb_edge,cmap='gray',format='png')
    #plot
    fig = plt.figure()
    fig.suptitle(f,fontsize='16')
    ax = plt.subplot(1,2,1)
    ax.set_title("original")
    plt.imshow(img)
    ax = plt.subplot(1,2,2)
    ax.set_title("sobel operator")
    plt.imshow(rgb_edge,cmap='gray')
    plt.show()


if __name__ == "__main__":
    dirpath = "images/"
    files = os.listdir(dirpath)
    for f in files:
        fpath = dirpath + f
        print(fpath)
        img = cv2.imread(fpath)
        rgb_edge = sobel(img)
        imgplot(f,img,rgb_edge)

