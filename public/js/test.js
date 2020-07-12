

let data = localStorage.getItem('data')
        // alert(data);
        $("#timer_title").text(data);


        let startTime;
        let timeLeft;
        let timeToCountDown = 1500 * 1000;
        let timerId;
        let isRunning = false;

        function updateTimer(t) {
            let d = new Date(t);
            let m = d.getMinutes();
            let s = d.getSeconds();
            let ms = d.getMilliseconds();
            m = ('0' + m).slice(-2);
            s = ('0' + s).slice(-2);
            // ms = ('00' + ms).slice(-3);
            timer.textContent = m + ":" + s;
            // timer.textContent = m + ":" + s + "." + ms;
        }

        function countDown() {
            timerId = setTimeout(function() {
                // let elaspedTime = Date.now() - startTime;
                timeLeft = timeToCountDown - (Date.now() - startTime);
                if (timeLeft < 0) {
                    isRunning = false;
                    startBtn.textContent = "Start"
                    clearTimeout(timerId);
                    timeLeft = 0;
                    timeToCountDown = 0;
                    updateTimer(timeLeft);
                    return;
                }
                // console.log(timeLeft);
                updateTimer(timeLeft);

                countDown();
            }, 10);
        }

        $("#startBtn").on("click", function() {
            if (isRunning == false) {
                isRunning = true;
                // startBtn.textContent = "Stop";
                startTime = Date.now();
                countDown();
            } else {
                isRunning = false;
                // startBtn.textContent = "Start";
                timeToCountDown = timeLeft;
                clearTimeout(timerId);
            }

        });

        $("#resetBtn").on("click", function() {
            timeToCountDown = 1500 * 1000;
            // $("#timer").text("25:00");
            let title = $("#task").val();
            // let time = $("#timer").val();
            let time = $("#timer").html();
            let test2 =  timeToCountDown - timeLeft;
            
            
            var h = String(Math.floor(test2 / 3600000) + 100).substring(1);
            var m = String(Math.floor((test2 - h * 3600000)/60000)+ 100).substring(1);
            var s = String(Math.round((test2 - h * 3600000 - m * 60000)/1000)+ 100).substring(1);
            
            let test3 = h+':'+m+':'+s;
            
            // let test3 = 25:00;
            alert(
                title +"にかかった時間は"+  test3 +"です。"
                )
            clearTimeout(timerId);
            
            updateTimer(timeToCountDown);
            
           

        });
        
     