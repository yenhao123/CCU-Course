import numpy as np
import cv2
from PIL import Image
import matplotlib.pyplot as plt

def local_historgram(filename):
    #import
    img_gray = Image.open(filename).convert('L')
    img_arr = np.array(list(img_gray.getdata()))
    
    #split
    img_arr_split = np.reshape(img_arr,(16,4096))
    
    #pdf
    pdf = np.empty([16,256])
    for i in range(16):
        for j in range(256):
            pdf[i][j] = np.sum(img_arr_split[i]==j)
    
    #cdf
    cdf = np.empty([16,256])
    for i in range(16):
        cdf[i] = np.cumsum(pdf[i]/img_arr_split[i].size)
    
    
    #convert
    new_img_arr_split = np.empty([16,4096])
    block_histogram = np.empty([16,256])
    for i in range(16):
        histogram_value = np.around(cdf[i]*255,0).astype('uint8')
        block_histogram[i] = histogram_value
        new_img_arr_split[i] = histogram_value[img_arr_split[i]]
    
    print("blocks")
    print("-------------------------------------------------------")
    # plot - each block old histogram & new histogram
    for i in range(16):
        plt.subplots(1,2)
        plt.subplot(1,2,1)
        title = str(i+1) + " block - old_img histogram"
        plt.title(title)
        plt.hist(pdf[i],bins=range(0,256))
        plt.subplot(1,2,2)
        title = str(i+1) + " block - new_img histogram"
        plt.title(title)
        plt.hist(block_histogram[i],bins=range(0,256))
        plt.show()
    
    new_img_arr = np.reshape(new_img_arr_split,-1)
    new_img_arr = np.reshape(new_img_arr,(256,256))
    new_img = Image.fromarray(new_img_arr)
    if new_img.mode == 'F':
        new_img = new_img.convert('L')
    
    #export
    img_split = filename.split('.')[0]
    print(img_split)
    new_filename = img_split + "_local.bmp"
    new_img.save(new_filename)

    
    print("Whole picture's histogram, not blocks")
    print("-------------------------------------------------------")
    # plot - old v.s new img histogram
    fig,ax = plt.subplots(1,2)
    plt.subplot(1,2,1)
    plt.title("old_img histogram")
    plt.hist(img_arr,bins=range(0,256))
    plt.subplot(1,2,2)
    plt.title("new_img histogram")
    plt.hist(np.reshape(new_img_arr,-1),bins=range(0,256))
    plt.show()
    
    print("Old picture v.s New picture")
    print("-------------------------------------------------------")
    # plot - img
    fig,ax = plt.subplots(1,2)
    plt.subplot(1,2,1)
    plt.title('old_img')
    plt.imshow(img_gray,cmap='gray')
    plt.subplot(1,2,2)
    plt.title('new_img')
    plt.imshow(new_img,cmap='gray')
    fig.tight_layout()
    plt.show()


filename = "Lena.bmp"
local_historgram(filename)

filename = "Peppers.bmp"
local_historgram(filename)