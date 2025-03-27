import re
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import sent_tokenize, word_tokenize
from heapq import nlargest

nltk.download('punkt')
nltk.download('stopwords')

text = """Natural language processing (NLP) is a subfield of linguistics, computer science, 
information engineering, and artificial intelligence concerned with the interactions between 
computers and human languages, in particular how to program computers to process and analyze 
large amounts of natural language data. Challenges in natural language processing frequently 
involve speech recognition, natural language understanding, and natural language generation. 
The history of natural language processing generally started in the 1950s, although work 
can be found from earlier periods."""

text = re.sub(r'[^a-zA-Z. ]', '', text)  # Allowing periods for better sentence detection
sentences = sent_tokenize(text)
stop_words = set(stopwords.words('english'))

words = [word.lower() for word in word_tokenize(text) if word.lower() not in stop_words]
word_freq = nltk.FreqDist(words)

sentence_scores = {}
for sentence in sentences:
    for word in word_tokenize(sentence.lower()):
        word = word.lower()
        if word in word_freq:
            if len(sentence.split()) < 50:  # Increased threshold for better sentence selection
                if sentence not in sentence_scores:
                    sentence_scores[sentence] = word_freq[word]
                else:
                    sentence_scores[sentence] += word_freq[word]

summary_sentences = nlargest(3, sentence_scores, key=sentence_scores.get)
summary = " ".join(summary_sentences)

print("\nSummary:\n", summary)
