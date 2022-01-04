function toggle_page() {
  const main_page = document.getElementById('pagina-principal');
  const certificados_page = document.getElementById('pagina-certificados');

  main_page.style.display = 'none';
  certificados_page.style.display = 'block';
}

function ver_mais() {
  const destaque = document.getElementById('destaque');
  const categorias = document.getElementById('categorias');
  const ver_mais_btn = document.getElementById('ver-mais');

  console.log(ver_mais_btn);

  if(destaque.style.display === 'none'){
    destaque.style.display = 'block';
    categorias.style.display = 'none';
    ver_mais_btn.innerHTML = 'Ver mais';
  } else {
    destaque.style.display = 'none';
    categorias.style.display = 'block';
    ver_mais_btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M7.776 5.553a.5.5 0 0 1 .448 0l6 3a.5.5 0 1 1-.448.894L8 6.56 2.224 9.447a.5.5 0 1 1-.448-.894l6-3z" style="font-weight: 900; font-size: 500px"/>
  </svg>`;
  }
}