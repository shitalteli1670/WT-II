import re

text = "Hello,#world123!Thisisasampletextparagraph.Itcontainsspecialcharactersand5digits."
processed_text = re.sub(r'[^a-zA-Z\s]', '', text)
print(processed_text)
