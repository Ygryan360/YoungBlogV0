 <footer class="bg-dark">
     <div class="container">
         <div class="row text-center">
             <div class="col-lg-3 col-sm-6 mb-5">
                 <h5 class="font-primary text-white mb-4">
                     Made with &hearts; by
                     <a href="https://github.com/Ygryan360" class="text-white" style="text-decoration: underline;"
                         title="Mon Github">
                         Young Ryan
                     </a>
                 </h5>
             </div>
             <div class="col-lg-3 col-sm-6 mb-5">
                 <ul class="list-unstyled">
                     <li><a href="{{ route('blog.privacy') }}">Politique de Confidentialité</a></li>
                 </ul>
             </div>
             <div class="col-lg-3 col-sm-6 mb-5">
                 <ul class="list-unstyled">
                     <li>&copy {{ date('Y') }} | <a href="{{ route('blog.home') }}">Young Blog</a></li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>
