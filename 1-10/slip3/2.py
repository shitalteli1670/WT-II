import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression

data = {
    'UserID': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    'Gender': ['Male', 'Male', 'Female', 'Female', 'Male', 'Male', 'Female', 'Female', 'Male', 'Female'],
    'Age': [19, 35, 26, 27, 19, 27, 32, 25, 33, 45],
    'EstimatedSalary': [19000, 20000, 43000, 57000, 76000, 58000, 82000, 32000, 69000, 65000],
    'Purchased': [0, 0, 0, 1, 1, 0, 1, 0, 1, 1]
}

df = pd.DataFrame(data)

df['Gender'] = df['Gender'].map({'Male': 1, 'Female': 0})  # Encoding categorical variable

X = df.iloc[:, 1:4].values
y = df.iloc[:, 4].values

X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=0)

lr = LogisticRegression(random_state=0)
lr.fit(X_train, y_train)

observation = [[0, 30, 87000]]
prediction = lr.predict(observation)
print(prediction)

observations = [[0, 30, 87000], [1, 50, 45000], [1, 22, 30000]]
predictions = lr.predict(observations)
print(predictions)
