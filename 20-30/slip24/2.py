import pandas as pd

df = pd.read_csv(r"C:\Users\telis\OneDrive\Desktop\WT-II\20-30\slip24\INvideos.csv")

# Drop only columns that exist in the DataFrame
columns_to_drop = ['video_id', 'trending_date', 'channel_title', 'category_id', 
                   'publish_time', 'tags', 'thumbnail_link', 'comments_disabled', 
                   'ratings_disabled', 'video_error_or_removed']

df = df.drop(columns=[col for col in columns_to_drop if col in df.columns], axis=1)

df[['views', 'likes', 'dislikes', 'comment_count']] = df[['views', 'likes', 'dislikes', 'comment_count']].astype(int)

total_views = df['views'].sum()
total_likes = df['likes'].sum()
total_dislikes = df['dislikes'].sum()
total_comments = df['comment_count'].sum()

print('Total Views:', total_views)
print('Total Likes:', total_likes)
print('Total Dislikes:', total_dislikes)
print('Total Comments:', total_comments)
