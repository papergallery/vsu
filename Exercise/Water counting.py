x = int(input('How many minutes did you take a shower? \n'))

def counting_water(x):
    if x > 0:
        x =(x * 12)
        return x
    else:
        return print('Incorrect value')

print('You spent',counting_water(x),'bottles')