const express = require('express')
const app = express()

const reviews = [
    {user_id:1, restaurant_id:1, review:"Bersih, makannnya juga enak"},
    {user_id:1, restaurant_id:2, review:"Tempatnya agak sempit dan pengap"},
    {user_id:2, restaurant_id:3, review:"Dari luar, tempatnya sangat estetik"},
    {user_id:2, restaurant_id:2, review:"Agak kecil tempatnya, tapi makannya murah dan lumayan enak"}
]

app.get('/review', (req, res) => {
    res.json(reviews)
})

app.get('/review/restaurant/:restaurant_id', (req, res) => {
    const reviewId = parseInt(req.params.restaurant_id)
    const review = reviews.filter(review => review.restaurant_id === reviewId)

    if (review){
        res.json(review)
    }else{
        res.status(404).json({error : "Restaurant not Found"})
    }
})

app.get('/review/user/:user_id', (req, res) => {
    const userId = parseInt(req.params.user_id)
    const review = reviews.filter(review => review.user_id === userId)

    if (review){
        res.json(review)
    }else{
        res.status(404).json({error : "Restaurant not Found"})
    }
})

app.listen(5050, () => {
    console.log("Server berjalan")
})