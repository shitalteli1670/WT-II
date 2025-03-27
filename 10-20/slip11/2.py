import pandas as pd
from mlxtend.preprocessing import TransactionEncoder
from mlxtend.frequent_patterns import apriori, association_rules

dataset = [
    ['butter', 'bread', 'milk'],
    ['butter', 'flour', 'milk', 'sugar'],
    ['butter', 'eggs', 'milk', 'salt'],
    ['eggs'],
    ['butter', 'flour', 'milk', 'salt']
]

te = TransactionEncoder()
te_ary = te.fit_transform(dataset)
df = pd.DataFrame(te_ary, columns=te.columns_)

min_sup_values = [0.4, 0.3, 0.2]

for min_sup in min_sup_values:
    frequent_itemsets = apriori(df, min_support=min_sup, use_colnames=True)
    print(f"\nFrequent Itemsets with minimum support of {min_sup}:")
    print(frequent_itemsets)

    rules = association_rules(frequent_itemsets, metric="confidence", min_threshold=0.7)
    print(f"\nAssociation Rules with minimum support of {min_sup}:")
    print(rules)
