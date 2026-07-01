import pandas as pd
import numpy as np
from sklearn.ensemble import RandomForestClassifier
from sklearn.impute import SimpleImputer
from sklearn.pipeline import Pipeline
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
import joblib

# 1. Load the real dataset
print("Loading real Anemia dataset (anemia.csv)...")
try:
    df = pd.read_csv('anemia.csv')
except FileNotFoundError:
    print("Error: anemia.csv not found! Please place the CSV file in the same directory.")
    exit(1)

# 2. Automatically detect target column (Result or similar)
target_col = 'Result' if 'Result' in df.columns else df.columns[-1]

X = df.drop(columns=[target_col])
y = df[target_col]

# Split data into training and testing
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)
feature_names = X.columns.tolist()
print(f"Features found in the dataset: {feature_names}")

# 3. Create an AI Pipeline
# We use SimpleImputer so if any feature is missing from future tests, the AI handles it smoothly!
pipeline = Pipeline([
    ('imputer', SimpleImputer(strategy='mean')),
    ('classifier', RandomForestClassifier(n_estimators=100, random_state=42))
])

# 4. Train the Model
print(f"Training Artificial Intelligence on {len(df)} real medical records...")
pipeline.fit(X_train, y_train)

# Test model
y_pred = pipeline.predict(X_test)

# Calculate accuracy
accuracy = accuracy_score(y_test, y_pred)

print("Model Accuracy:", accuracy * 100, "%")

# 5. Save Model and Features
# We save the features list with the model so the extractor knows exactly what the AI expects dynamically.
joblib.dump({'model': pipeline, 'features': feature_names}, 'anemia_model.pkl')
print("Model trained and saved successfully as anemia_model.pkl!")
