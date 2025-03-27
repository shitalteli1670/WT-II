import pandas as pd
import nltk
from nltk.sentiment.vader import SentimentIntensityAnalyzer

df = pd.read_csv(r"C:\Users\telis\OneDrive\Desktop\WT-II\20-30\slip25\covid_2021_1.csv")

df.dropna(inplace=True)
df.drop_duplicates(subset='Comment', inplace=True)

nltk.download('punkt')
df['tokens'] = df['Comment'].apply(nltk.word_tokenize)

nltk.download('vader_lexicon')
sia = SentimentIntensityAnalyzer()
df['sentiment'] = df['Comment'].apply(lambda x: sia.polarity_scores(x)['compound'])

total_comments = len(df)
positive_comments = len(df[df['sentiment'] > 0])
negative_comments = len(df[df['sentiment'] < 0])
neutral_comments = len(df[df['sentiment'] == 0])

positive_percentage = (positive_comments / total_comments) * 100
negative_percentage = (negative_comments / total_comments) * 100
neutral_percentage = (neutral_comments / total_comments) * 100

print('Total Comments:', total_comments)
print(f'Positive Comments: {positive_comments} ({positive_percentage:.2f}%)')
print(f'Negative Comments: {negative_comments} ({negative_percentage:.2f}%)')
print(f'Neutral Comments: {neutral_comments} ({neutral_percentage:.2f}%)')
