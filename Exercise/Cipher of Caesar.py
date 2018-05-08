LineMessage = ''
MassMessage = []
alphabet = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж',
            'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о',
            'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц',
            'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я']
text = input('Enter the text in Russian for encryption: ').lower()
offset = int(input('Enter the length of the offset: '))
for i in text:
    if i not in alphabet:
        MassMessage.append(i)
    else:
        MassMessage.append(alphabet[alphabet.index(i) + offset])
for i in range(len(MassMessage)):
    LineMessage += MassMessage[i]
print('Encrypted message: ', LineMessage)