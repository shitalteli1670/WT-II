import pandas as pd
from mlxtend.preprocessing import TransactionEncoder
from mlxtend.frequent_patterns import apriori, association_rules

df = pd.read_csv(r"C:\Users\telis\OneDrive\Desktop\WT-II\1-10\slip8\market_basket.csv", header=None, sep=",", engine="python", on_bad_lines="skip")

transactions = df.apply(lambda x: x.dropna().tolist(), axis=1).tolist()

te = TransactionEncoder()
te_ary = te.fit(transactions).transform(transactions)
df_encoded = pd.DataFrame(te_ary, columns=te.columns_)

frequent_itemsets = apriori(df_encoded, min_support=0.01, use_colnames=True)
rules = association_rules(frequent_itemsets, metric="lift", min_threshold=1)

print("Dataset Information:")
print(df.info())

print("\nFrequent Itemsets:")
print(frequent_itemsets)

print("\nAssociation Rules:")
print(rules)
