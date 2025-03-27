import pandas as pd
from mlxtend.preprocessing import TransactionEncoder
from mlxtend.frequent_patterns import apriori, association_rules

dataset = {
    1: ["eggs", "milk", "bread"],
    2: ["eggs", "apple"],
    3: ["milk", "bread"],
    4: ["apple", "milk"],
    5: ["milk", "apple", "bread"]
}

transactions = list(dataset.values())

te = TransactionEncoder()
te_ary = te.fit_transform(transactions)
df = pd.DataFrame(te_ary, columns=te.columns_)

min_sup = 0.4
frequent_itemsets = apriori(df, min_support=min_sup, use_colnames=True)
association_rules_df = association_rules(frequent_itemsets, metric="confidence", min_threshold=0.6)

print("\nFrequent Itemsets:")
print(frequent_itemsets)

print("\nAssociation Rules:")
print(association_rules_df)
