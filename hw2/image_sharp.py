import numpy as np
import cv2
import matplotlib.pyplot as plt


class imageSharpening():
    def __init__(self,filenames):
        self.filenames = filenames

    def loadImage(self):
        imgs = []
        for i in range(len(self.filenames)):
            filename = filenames[i]
            img = cv2.imread(filename,0)
            imgs.append(img)
        return imgs
    
    def showImages(self,images):
        for i in range(len(images)):
            image = images[i]
            plt.subplot(int(len(images)/2),2,i+1)
            plt.imshow(image,cmap="gray")
        plt.show()

    def lap(self,imgs):
        outputs = []
        for i in range(len(imgs)):
            img = imgs[i]
            output = np.zeros((img.shape[0],img.shape[1]))
            for row in range(1,img.shape[0]-1):
                for col in range(1,img.shape[1]-1):
                    output[row][col] = 5*img[row][col] - img[row+1][col] - img[row-1][col] - img[row][col+1] - img[row][col-1]
            outputs.append(output.copy())
        return outputs

    def high_boost(self,imgs,lap_output):
        A2_outputs = []
        A0_outputs = []
        for i in range(len(imgs)):
            img = imgs[i]
            lap = lap_output[i]
            #A = 2,img+lap
            output = img + lap
            A2_outputs.append(output.copy())
            #A = 0,img-lap
            output = img - lap
            A0_outputs.append(output.copy())
        outputs = []
        outputs.append(A2_outputs)
        outputs.append(A0_outputs)
        return outputs
            

filenames = ["HW2_test_image/blurry_moon.tif","HW2_test_image/skeleton_orig.bmp"]
imgs = imageSharpening(filenames)
imgs_arr = imgs.loadImage()
#do lap
lap_output = imgs.lap(imgs_arr)
#do high_boost
hb_output = imgs.high_boost(imgs_arr,lap_output)

#show images
print("原始圖片")
imgs.showImages(imgs_arr)
print("laplacian後的圖片")
imgs.showImages(lap_output)
print("high_boost後A=2的圖片")
imgs.showImages(hb_output[0])
print("high_boost後A=0的圖片")
imgs.showImages(hb_output[1])
