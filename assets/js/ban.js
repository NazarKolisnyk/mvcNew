document.querySelector('#role').addEventListener('change', function (e) {
    console.log(e.target.value);
    if (e.target.value == "0") {
        document.querySelector('#ban').classList.add('line');
    }  else {
        document.querySelector('#ban').classList.remove('line');
    }
})