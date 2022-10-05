let lastInput = "",
  terminal = document.querySelector("#terminal"),
  terminalBox = document.querySelector(".terminal"),
  wrapper = document.querySelector(".wrapper");

document.addEventListener('keydown', function (event) {
  if (event.code == 'F12' && event.ctrlKey) {
    terminalBox.classList.add('visible');
    wrapper.classList.add('opacity')
  }
  if (event.code == 'Escape') {
    terminalBox.classList.remove('visible');
    wrapper.classList.remove('opacity')
  }


  if (terminalBox.classList.contains('visible')) {
    if (event.code == 'Enter') {
      lastInput = terminal.value;
    }
    if (event.code == 'Backspace' || event.code == 'Delete') {
      const comand = terminal.value;
      if (comand.length <= lastInput.length) {
        terminal.value = lastInput;
        event.preventDefault();
      }
    }
  }
});