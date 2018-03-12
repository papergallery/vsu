yScale = 3
scale = 1
def line(x):
    return x*x

def drawFunction(func, minX, maxX, n):
    minY, maxY = 10**5, -10**5
    dx = (maxX - minX) / n
    x = []
    y = []
    for i in range(n):
        x.append(minX + dx * i)
        y.append(func(x[i]))
        if y[i] > maxY:
            maxY = y[i]
        if y[i] < minY:
            minY = y[i]

    # # For horizontal Y
    # for i in range(len(y)):
    #     outString = ""
    #     for j in range(int(yScale * y[i])-1):
    #         outString += " "
    #     outString += "*"
    #     print(outString)

    # For horizontal X
    dy = (maxY - minY) / n
    for j in range(n):
        for i in range(n):
            outString = ""
            if y[i] > (maxY - dy * (j + 1)) and y[i] <= (maxY - dy * j):
                count.append(i)
                for k in range(int(scale * x[i] - minX) -1):
                    outString += " "
                outString += "@"
                print(outString)

drawFunction(line, -10, 10, 100)