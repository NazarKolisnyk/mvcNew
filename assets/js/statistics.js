let login = document.querySelector('#statistic').getAttribute("data-login").split(';'),
    password = document.querySelector('#statistic').getAttribute("data-password").split(';'),
    message = document.querySelector('#statistic').getAttribute("data-message").split(';'),
    button = document.querySelector('#start'),
    time = document.querySelector('#time'),
    params = document.querySelector('#params'),
    visual = document.querySelector('#visual'),
    timeLine = document.querySelector("#time-line"),
    months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    years = [2021, 2022, 2023, 2024, 2025],
    days = [],
    backgroundColor = [],
    borderColor = [],
    number = [],
    option;

time.addEventListener('change', function (e) {
    let line;
    if (e.target.value === "months") {
        line = years;
        timeLine.classList.add('line');
    } else if (e.target.value === "days") {
        line = months;
        timeLine.classList.add('line');
    } else {
        timeLine.classList.remove('line');
    }
        
    option = "";
    line.forEach(function (item, index) {
        option += '<option value="' + index + '">' + item + '</option>';
    });
    timeLine.innerHTML = option;
})



button.addEventListener('click', function () {
    document.querySelector('#Scheme').remove();
    document.querySelector('#wrapper').innerHTML = '<canvas id="Scheme"></canvas>';

    setDate();
});

Date.prototype.daysInMonth = function () {
    let thisMonths = 32 - new Date(this.getFullYear(), this.getMonth(), 32).getDate();
    for (let i = 0; i < thisMonths; i++) {
        days[i] = i + 1;
    }
    return days
};

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

function setDate() {
    (time.value === "years") ? arr = years: (time.value === "months") ? arr = months : (time.value === "days") ? arr = new Date().daysInMonth() : arr = [];
    (params.value === "login") ? date = login: (params.value === "password") ? date = password : (params.value === "message") ? date = message : date = [];

    for (let i = 0; i < arr.length; i++) {
        number[i] = 0;
        backgroundColor[i] = 'rgba(' + getRandomInt(225) + ',' + getRandomInt(225) + ',' + getRandomInt(225) + ', 0.6)';
        borderColor[i] = 'rgba(' + getRandomInt(225) + ',' + getRandomInt(225) + ',' + getRandomInt(225) + ', 1)';
    }

    date.forEach(function (item) {
        if (arr === years) {
            number[new Date(item).getFullYear() - 2021] += 1
        } else if (arr === months) {
            (new Date(item).getFullYear() - 2021 === timeLine.value) ? number[new Date(item).getMonth()] += 1 : number;
        } else if (arr === days) {
            console.log(new Date(item).getMonth());
            console.log(new Date(timeLine.value).getMonth());
            (new Date(item).getFullYear() === new Date().getFullYear() && new Date(item).getMonth() - 1 === new Date(timeLine.value).getMonth()) ?
            number[new Date(item).getDate() - 1] += 1 : number;
        };
    });

    getStatistics(visual.value, arr, number, backgroundColor, borderColor);
}

function getStatistics(type, part, number, background, border) {
    const ctx = document.getElementById('Scheme').getContext('2d');
    const Month = new Chart(ctx, {
        type: type,
        data: {
            labels: part,
            datasets: [{
                label: '# of Votes',
                data: number,
                backgroundColor: background,
                borderColor: border,
                borderWidth: 2,
            }]
        }
    });
}