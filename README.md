# Sentiment Analyzer Demo

- Created with Laravel 7.x and Amazon Comprehend API
- Deployed to ECS



# How to Run in Local (using Valet)

```
# make sure you have created .env file tailored for your local environment
cp .env.example .env
vi .env
```



# Demo: Analyze customer feedback on our new website design
```
http -f http://demo-sentiment-analyzer.test/api/analyze text="I really like the new design of your website"

{
    "lang": {
        "LanguageCode": "en",
        "Score": 0.9966965317726135
    },
    "sentiment": {
        "Mixed": 6.388971769411e-07,
        "Negative": 3.6831359466305e-05,
        "Neutral": 0.0009702272363938391,
        "Positive": 0.998992383480072
    }
}
```

```
http -f http://demo-sentiment-analyzer.test/api/analyze text="The new design is awful"

{
    "lang": {
        "LanguageCode": "en",
        "Score": 0.995132565498352
    },
    "sentiment": {
        "Mixed": 1.1714613492586068e-06,
        "Negative": 0.9997686743736267,
        "Neutral": 0.00020476507779676467,
        "Positive": 2.5369010472786613e-05
    }
}
```

```
http -f http://demo-sentiment-analyzer.test/api/analyze text="I am not sure if I like the new design"

{
    "lang": {
        "LanguageCode": "en",
        "Score": 0.9954488277435303
    },
    "sentiment": {
        "Mixed": 0.0011382695520296693,
        "Negative": 0.12217484414577484,
        "Neutral": 0.7719419002532959,
        "Positive": 0.10474501550197601
    }
}
```
