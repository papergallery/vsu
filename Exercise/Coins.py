coins = [0, 0, 0, 0]
cent = [50, 10, 5, 1]
value = int(input('Enter the value of your bill: '))
for i in range(len(cent)):
    while value >= cent[i]:
        value -= cent[i]
        coins[i] += 1
    print(coins[i], 'coins by', cent[i], 'cent')