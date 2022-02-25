(function () {
    function checkTime(i) {
        return (i < 10) ? "0" + i : i;
    }

    function startTime() {
        var today = new Date(),
            h = checkTime(today.getHours()),
            m = checkTime(today.getMinutes()),
            s = checkTime(today.getSeconds());
            var ampm = h >= 12 ? 'PM' : 'AM';
            h = h % 12;
  			h = h ? h : 12; // the hour '0' should be '12'

  			//m = m < 10 ? '0'+m : m;
  			var strTime = "CURRENT TIME &nbsp&nbsp" + h + ':' + m + ":" + s + ' ' + ampm;
        document.getElementById('time').innerHTML = strTime;
        t = setTimeout(function () {
            startTime()
        }, 500);
    }
    startTime();
})();

