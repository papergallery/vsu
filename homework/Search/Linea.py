def search(a, list):
    for k in range(len(list)):
        if list[k] == a:
            return k
        return -1

num = [9, 5, 3, 13, 16]
print(search(42, num))