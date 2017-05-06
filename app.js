const express = require('express');
const app = express();
const bodyParser = require('body-parser');
var db = require('./models/db.js');
var dbname = 'final_project';
var mongoose = require('mongoose');
var User = mongoose.model('User');
var User2 = mongoose.model('User');
var User3 = mongoose.model('User');
var User0 = mongoose.model('User');
// 引入函式庫

// 連接database


var db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', function() {
    console.log('資料庫連接成功');
})

app.use(bodyParser.urlencoded({
    // 不在 body 處理 Query String
    extended: false
}));


//設定靜態檔案所在目錄
app.use(express.static(__dirname + '/public'));

//app.post('/login', function(req, res) {
       // console.log(req.body);
   //     var data = {
    //        username: req.body.username,
    //        password: req.body.password,
     //       group_id:1
    //    }
    //    User.find(data, function(err, user) {
    //        if (user.length == 0)
           
   
               // res.redirect('http://google.com');
       //     else{
    //    User.update({ "username": req.body.username }, {
     //       $set: {"group_id": 2}
    //    }, function(err) {
    //       if (err) {
     //           console.log(err)
    //       }
           
   //     });
    //            res.redirect("/member.html");
    //        }
   //     });

  //  })


    app.post('/login', function(req, res) {
        console.log(req.body);

        var data1 = {
            username: req.body.username,
            password: req.body.password,
            group_id:1
        }

      User.find(data1, function(err, user) {
            if (user.length == 0 )
                res.redirect("/err.html");
            else 
                res.redirect("/main.html");
                
//|| req.body.admin_username!="admin@01"|| req.body.admin_username!="admin@02"
        });
    })
   


app.post('/login2', function(req, res) {
        console.log(req.body);

        var data2 = {
            username: req.body.doc_username,
            password: req.body.doc_password,
            group_id:2
        }

      User2.find(data2, function(err, user) {
            if (user.length == 0 )
                res.redirect("/err.html");
            else 
                res.redirect("/main2.html");
                
//|| req.body.admin_username!="admin@01"|| req.body.admin_username!="admin@02"
        });
    })



app.post('/login3', function(req, res) {
        console.log(req.body);


        // User.find(function(err, users){
        //     console.log(users);
        // });

        var data3 = {
            username: req.body.admin_username,
            password: req.body.admin_password,
            group_id:3
        }

      User3.find(data3, function(err, user) {
            if (user.length == 0 )
                res.redirect("/err.html");
            else
                res.redirect("/main3.html");

        });
    })










// 取得使用者列表
app.get('/user/list', function(req, res) {
    User.find(function(err, users) {
        res.send(JSON.stringify(users));
        res.end();
    });
})

app.get('/user/list', function(req, res) {
  User2.find(function(err, users) {
        res.send(JSON.stringify(users));
        res.end();
    });
})

app.listen(3000, function() {
    console.log('Example app listening on http://127.0.0.1:3000/');
})
