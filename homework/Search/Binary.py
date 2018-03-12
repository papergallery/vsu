def search(list, a, b, c):
    if b >= 1:
        m = 1 + (b - 1)//2
        if list[m] == c:
            return m
        elif list[m] > c:
            return search(list, a, m-1,c)
        else:
            return search(list, m + 1, b, c)
    else:
        return -1

num = [3, 5, 9, 13, 30]
c = 10

print(search(num, 0, len(num)-1, c))