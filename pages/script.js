var catalogContent = document.getElementById('catalogModal');
var btn = document.getElementById('openCatalog');

btn.onclick = function() {
  if (catalogContent.style.display === 'flex') {
    // Если уже открыто, закрыть с анимацией
    catalogContent.style.display = 'none';
  } else {
    // Если закрыто, открыть с анимацией
    catalogContent.style.display = 'flex';
    // Добавить анимацию, например, выезд вниз
    catalogContent.style.animation = 'slideDown 0.5s ease';
  }
};

var profileContent = document.getElementById('window');
var button = document.getElementById('openProfile');

button.onclick = function() {
  if (profileContent.style.display === 'flex') {
    // Если уже открыто, закрыть с анимацией
    profileContent.style.display = 'none';
  } else {
    // Если закрыто, открыть с анимацией
    profileContent.style.display = 'flex';
    // Добавить анимацию, например, выезд вниз
    profileContent.style.animation = 'slideDown 0.5s ease';
  }
};