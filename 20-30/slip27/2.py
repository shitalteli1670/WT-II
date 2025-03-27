import random
import csv
import pandas as pd

transactions = []
for i in range(1, 101):
    transaction_id = i
    transaction_date = f"2022-05-{random.randint(1, 31):02d}"
    customer_id = random.randint(1, 10)
    item_id = random.choice(["A", "B", "C"])
    item_price = round(random.uniform(10.0, 100.0), 2)
    quantity = random.randint(1, 10)
    transactions.append([transaction_id, transaction_date, customer_id, item_id, item_price, quantity])

with open("transactions.csv", "w", newline="") as csvfile:
    writer = csv.writer(csvfile)
    writer.writerow(["TransactionID", "TransactionDate", "CustomerID", "ItemID", "ItemPrice", "Quantity"])
    for transaction in transactions:
        writer.writerow(transaction)

df = pd.read_csv("transactions.csv")
df["ItemPrice"] = pd.to_numeric(df["ItemPrice"])
df["Sales"] = df["ItemPrice"] * df["Quantity"]
total_sales = df.groupby("CustomerID")["Sales"].sum().reset_index()
print(total_sales)
