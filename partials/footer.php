</main>
<footer class="site-footer">
  <p>© 2025 Matrix Experience</p>
</footer>

<script>
const btn=document.querySelector('.nav-toggle'),nav=document.getElementById('primary-nav');
if(btn&&nav){
  btn.addEventListener('click',()=>{const e=btn.getAttribute('aria-expanded')==='true';btn.setAttribute('aria-expanded',String(!e));nav.classList.toggle('show',!e)});
  nav.addEventListener('click',e=>{if(e.target.matches('a')){btn.setAttribute('aria-expanded','false');nav.classList.remove('show')}})
  document.addEventListener('keydown',e=>{if(e.key==='Escape'&&nav.classList.contains('show')){btn.setAttribute('aria-expanded','false');nav.classList.remove('show')}})
}
(function(){
  const p=location.pathname.split('/').pop()||'index.php';
  document.querySelectorAll('#primary-nav a[data-page]').forEach(a=>{if(a.dataset.page===p)a.classList.add('active')});
})();
</script>
</body>
</html>
