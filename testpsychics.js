var vueObject = new Vue({
  el: '#app',
  data: {
  	message : "Экстрасенсы",
    errortext : null,
    user_key : '',
    user_number : 10,
    user_numbers : [],
    list_ps : [
                { p_name: 'A', p_raiting: 100 },
                { p_name: 'B', p_raiting: 100 },
                { p_name: 'C', p_raiting: 100 }
                ]
  },

  computed: {
    ps_count: function () {
      return this.list_ps.length;
    }
  },

  mounted() {
        // then app loaded
        this.makeUserKey();
  }, 

  methods: {
        onMakeStep: function () {
            console.log(this.list_ps);

            this.errortext = null;

            if (!($.isNumeric(this.user_number)))
            {
              this.errortext = "Введите целое 2-хзначное число (*)";
              return;
            }

            if ((this.user_number < 10) || (this.user_number > 99))
            {
              this.errortext = "Введите целое 2-хзначное число (**)";
              return;
            }

            // пополнение догадок - this.user_numbers.forecast
            var itemOneNumber = {number: this.user_number, forecast : []}; // { name: psychics_name, number: psychics_num }

            for (var i = 0; i < this.list_ps.length; i++) {
              var psychics_name = this.list_ps[i].p_name;
              var psychics_num = Math.floor(10 + Math.random() * 89.99);

              var item_forecast = { name: psychics_name, number: psychics_num };

              itemOneNumber.forecast.push(item_forecast);

              // изменение достоверности экстрасенса
              if (psychics_num == this.user_number)
                this.list_ps[i].p_raiting++;
              else
                this.list_ps[i].p_raiting--;
            }

            this.user_numbers.push(itemOneNumber);

            console.log(this.user_numbers);

            // сохранить все данные на сервере в SqlLite - объект this.user_numbers

            var http = new XMLHttpRequest();
            var url = "apiuser.php";
            var params = "user_number=" + this.user_number 
                  + "&user_key=" + this.user_key;
            http.open("POST", url, true); // async

            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            http.onload = function() {
                if (http.status == 200) {
                    console.log(http.responseText);

                    var answer = JSON.parse(JSON.stringify(http.responseText));
                    var err = answer.errortext;
                    this.errortext = err;

                    //this.user_numbers = [];

                    // наполнить значения user_numbers из значений http.responseText
                    //alert(http.responseText); // DEBUG!

                    //console.log(JSON.parse(JSON.stringify(http.responseText))); // !!!

                    // var answer = JSON.parse(JSON.stringify(http.responseText));
                    // //alert(answer);

                    // var rows = answer['data'];

                    // for(var i in rows)
                    // {
                    //      var num = rows[i].user_number;
                    //      this.user_numbers.push(num);
                    // }                    
                    // //this.user_numbers = JSON.parse(JSON.stringify(http.responseText));

                    // console.log(this.user_numbers);
                }
                else
                {
                  this.errortext = "ERROR: http.status = " + http.status;
                }
            }
            
            http.send(params);
        },

        makeUserKey: function() {
            if (this.user_key == "")
                this.user_key = this.getUniqKey();
        },

        getUniqKey: function() {
          var text = "";
          var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

          for (var i = 0; i < 100; i++)
              text += possible.charAt(Math.floor(Math.random() * possible.length));

          return text;
        }

  }

})
