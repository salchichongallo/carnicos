document.querySelectorAll('.alert__close')
  .forEach((element) => {
    element.addEventListener('click', () => {
      (element.parentElement as HTMLElement).remove();
    });
  });
