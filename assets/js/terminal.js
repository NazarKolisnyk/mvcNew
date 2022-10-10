let lastInput = "",
  comands = [['color', 'bg_color', 'clear', 'help'], ['echo']],
  terminal = document.querySelector("#terminal"),
  terminalBox = document.querySelector(".terminal"),
  wrapper = document.querySelector(".wrapper-terminal");

document.addEventListener('keydown', function (event) {
  if (event.code == 'F12' && event.ctrlKey) {
    terminalBox.classList.add('visible');
    wrapper.classList.add('opacity')
  }
  if (event.code == 'Escape') {
    terminalBox.classList.remove('visible');
    wrapper.classList.remove('opacity');
  }


  if (terminalBox.classList.contains('visible')) {
    if (event.code == 'Enter') {
      let array = terminal.value.split('\n'),
        comand = array[array.length-1].split(' ');
        switch (comands[0].indexOf(comand[0])) {
          case 0: terminal.style.color = comand[1];
          break;
          case 1: terminal.style.background = comand[1];
          break;
          case 2: terminal.value = '';
          break;
          case 3: terminal.value += '\n--------\n*COMANDS*\n' + comands[0].join('\n') + '\n' + comands[1].join('\n') + '\n--------';
          break;
        }
        lastInput = terminal.value;
    }
    if (event.code == 'Backspace' || event.code == 'Delete') {
      const comand = terminal.value;
      if (comand.length <= lastInput.length + 1) {
        event.preventDefault();
      }
    }
  }
  if (event.code && terminalBox.classList.contains('visible')) {
  terminal.focus();
  terminal.setSelectionRange(terminal.value.length, terminal.value.length);
  }
});
