print('It is necessary to enter the height of the pyramid \nCondition: 1 to 23 \nPyramid height ')
x = int(input())
j = 0
i = 0
while x < 1 or x > 23:
    print('Error! You violated the terms of the program \nEnter new value')
    x = int(input())

for j in range(x):
    Block = ""
    for i in range(x+2):
        if i >= (x - j) and i <= (x + 1):
            Block += '#'
        else:
            Block += ' '
    print(Block)