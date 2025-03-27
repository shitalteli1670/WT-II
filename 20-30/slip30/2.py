from mlxtend.frequent_patterns import apriori, association_rules
from mlxtend.preprocessing import TransactionEncoder
import pandas as pd

transactions = [['eggs', 'milk', 'bread'], ['eggs', 'apple'], ['milk', 'bread'], ['apple', 'milk'], ['milk', 'apple', 'bread']]

item_to_num = {'eggs': 1, 'milk': 2, 'bread': 3, 'apple': 4}

numeric_transactions = []
for transaction in transactions:
    numeric_transaction = [item_to_num[item] for item in transaction]
    numeric_transactions.append(numeric_transaction)

te = TransactionEncoder()
te_ary = te.fit(numeric_transactions).transform(numeric_transactions)
df = pd.DataFrame(te_ary, columns=te.columns_)

frequent_itemsets = apriori(df, min_support=0.4, use_colnames=True)

rules = association_rules(frequent_itemsets, metric="confidence", min_threshold=0.7)

print(frequent_itemsets)
print(rules)
