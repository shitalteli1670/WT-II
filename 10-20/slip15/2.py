import pandas as pd
from mlxtend.frequent_patterns import apriori, association_rules

data = {
    'No': [1, 2, 3, 4],
    'Company': ['Tata', 'MG', 'Kia', 'Hyundai'],
    'Model': ['Nexon', 'Astor', 'Seltos', 'Creta'],
    'Year': [2017, 2021, 2019, 2015]
}

df = pd.DataFrame(data)

df = df.drop(columns=['No', 'Year'])  # Remove unnecessary columns

df = pd.get_dummies(df)  # Convert categorical data into binary format

print("Transformed DataFrame:\n", df)

# Use a lower min_support to allow more frequent itemsets
frequent_itemsets = apriori(df, min_support=0.25, use_colnames=True)

if frequent_itemsets.empty:
    print("\nNo frequent itemsets found. Try reducing min_support further.")
else:
    print("\nFrequent Itemsets:\n", frequent_itemsets)

    rules = association_rules(frequent_itemsets, metric="confidence", min_threshold=0.7)
    print("\nAssociation Rules:\n", rules if not rules.empty else "No association rules found.")
