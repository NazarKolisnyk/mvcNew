let lastInput = 0,
  commands = ['color', 'bg_color', 'clear', 'help'],
  terminal = document.querySelector("#terminal"),
  terminalBox = document.querySelector(".terminal"),
  wrapper = document.querySelector(".wrapper-terminal");

document.addEventListener('keydown', function (event) {
  if (event.code === 'F12' && event.ctrlKey) {
    terminalBox.classList.add('visible');
    wrapper.classList.add('opacity')
  }
  if (event.code === 'Escape') {
    terminalBox.classList.remove('visible');
    wrapper.classList.remove('opacity');
  }

  if (terminalBox.classList.contains('visible')) {
    if (event.code === 'Enter') {
      let array = terminal.value.split('\n'),
          fullCommand = array[array.length-1],
          command = fullCommand.split(' ');

        switch (commands.indexOf(command[0])) {
          case 0: terminal.style.color = command[1];
          break;
          case 1: terminal.style.background = command[1];
          break;
          case 2: terminal.value = ''; event.preventDefault();
          break;
          case 3: terminal.value += '\n--------\n*COMMANDS*\n' + commands.join('\n') + '\n--------';
          break;
          default:
            let post = '';
            let request = new XMLHttpRequest();

            request.open('POST', '/Controller/Admin/Terminal.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send('command=' + fullCommand);
            request.addEventListener('load', function(){
              if (request.status === 200) {
                let data = request.response;
                // console.log(JSON.parse(data).join('\n'))
                terminal.value += data  + '\n';
                lastInput = terminal.value.length;
              } else {
                terminal.value += "Помилка! Спробуйте пізніше...";
              }
            });
        }
        lastInput = terminal.value.length + 1;
    }
    if (event.code === 'Backspace' || event.code === 'Delete') {
      const value = terminal.value;
      if (value.length <= lastInput) {
        event.preventDefault();
      }
    }
  }
  if (event.code && terminalBox.classList.contains('visible')) {
  terminal.focus();
  terminal.setSelectionRange(terminal.value.length, terminal.value.length);
  }
});
