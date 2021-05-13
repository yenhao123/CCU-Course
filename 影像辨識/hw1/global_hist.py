#pil
import numpy as np
import cv2
from PIL import Image
import matplotlib.pyplot as plt

def pilHistorgram(filename):
    img_gray = Image.open(filename).convert('L')
    img_arr = np.array(list(img_gray.getdata()))
    
    ###PDF
    pdf = np.empty([256])
    for i in range(256):
        pdf[i] = np.sum(img_arr==i)
    
    ###CDF
    cdf = np.cumsum(pdf/img_arr.size)
    
    #convert img
    histogram_value = np.around(cdf * 255,0).astype('uint8')
    new_img_arr = histogram_value[img_arr]
    new_img_arr = np.reshape(new_img_arr,(256,256))
    new_img = Image.fromarray(new_img_arr)
    
    #export img
    img_split = filename.split('.')[0]
    print(img_split)
    new_filename = img_split + "_gloabal.bmp"
    new_img.save(new_filename)

    #save in dict,item(pdf,histogram_value,img_gray,new_img)
    retDict = {}
    retDict["pdf"] = pdf;
    retDict["histogram_value"] = histogram_value
    retDict["img_gray"] = img_gray
    retDict["new_img"] = new_img
    return retDict
   
def plot(retDic):   
    # plot
    print("picture's histogram")
    print("-------------------------------------------------------")
    fig,ax = plt.subplots(1,2)
    plt.subplot(1,2,1)
    plt.title("old_img histogram")
    plt.hist(retDic["pdf"],bins=range(0,256))
    plt.subplot(1,2,2)
    plt.title("new_img histogram")
    plt.hist(retDic["histogram_value"],bins=range(0,256))
    plt.show()
    
    print("Old picture v.s New picture")
    print("-------------------------------------------------------")
    
    plt.subplots(1,2)
    plt.subplot(1,2,1)
    plt.title('old_img')
    plt.imshow(retDic["img_gray"],cmap='gray')
    plt.subplot(1,2,2)
    plt.title('new_img')
    plt.imshow(retDic["new_img"],cmap='gray')
    fig.tight_layout()
    plt.show()
    
filename = "Lena.bmp"
retDict = pilHistorgram(filename)
plot(retDict)

print("-------------------------------------------------------")

filename = "Peppers.bmp"
retDic = pilHistorgram(filename)
plot(retDic)