import pandas as pd
from mlxtend.preprocessing import TransactionEncoder
from mlxtend.frequent_patterns import apriori, association_rules

df = pd.read_csv(r"c:\Users\telis\OneDrive\Desktop\WT-II\1-10\slip7\Market_Basket_Optimisation.csv", header=None)
df.dropna(inplace=True)

te = TransactionEncoder()
te_ary = te.fit(df.apply(lambda x: x.dropna().tolist(), axis=1)).transform(df.apply(lambda x: x.dropna().tolist(), axis=1))
df_encoded = pd.DataFrame(te_ary, columns=te.columns_)

frequent_itemsets = apriori(df_encoded, min_support=0.01, use_colnames=True)
rules = association_rules(frequent_itemsets, metric="lift", min_threshold=1)

print("Original Dataset (First 5 Rows):\n")
print(df.head())
print("\nFrequent Itemsets:\n")
print(frequent_itemsets)
print("\nAssociation Rules:\n")
print(rules)
