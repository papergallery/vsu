i=1
a=4
b=6

#     if i != 0:
#         c = a * b / i
#     else:
#         с=0
# print(c)
def calcCakeCount(personsCount):
    if personsCount < 1:
        return 0
    elif personsCount == 1:
        return 3
    elif personsCount < 5:
        if personsCount % 2 == 0:
            return personsCount * 3.5
        else:
            return personsCount * 3.5 + 0.5
    else:
        return int(personsCount * 3.3)

count = calcCakeCount(8)
print(count)