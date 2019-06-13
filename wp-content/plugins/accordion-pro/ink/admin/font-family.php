<select name="font_family" id="font_family" class="standard-dropdown" onchange="get_font_group()"  style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>>Arial</option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>>Arial Black</option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>>Courier New</option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>>Georgia</option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>>Grande</option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>>Helvetica Neue</option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>>Impact</option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>>Lucida</option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>>Lucida Grande</option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>>Open Sans</option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>>OpenSansBold</option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>>Palatino</option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>>Sans</option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>>Sans-Serif</option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>>Tahoma</option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>>Times New Roman</option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>>Trebuchet</option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>>Verdana</option>
					</optgroup>
					<optgroup label="Google Fonts">
						<option value="Abel"<?php selected($font_family, 'Abel' ); ?>>Abel</option>
						<option value="Abril Fatface" <?php selected($font_family, 'Abril Fatface' ); ?>>Abril Fatface</option>
						<option value="Aclonica" <?php selected($font_family, 'Aclonica' ); ?>>Aclonica</option>
						<option value="Acme" <?php selected($font_family, 'Acme' ); ?>>Acme</option>
						<option value="Actor" <?php selected($font_family, 'Actor' ); ?>>Actor</option>
						<option value="Adamina" <?php selected($font_family, 'Adamina' ); ?>>Adamina</option>
						<option value="Advent Pro" <?php selected($font_family, 'Advent Pro' ); ?>>Advent Pro</option>
						<option value="Aguafina Script" <?php selected($font_family, 'Aguafina Script' ); ?>>Aguafina Script</option>
						<option value="Aladin" <?php selected($font_family, 'Aladin' ); ?>>Aladin</option>
						<option value="Aldrich" <?php selected($font_family, 'Aldrich' ); ?>>Aldrich</option>
						<option value="Alegreya" <?php selected($font_family, 'Alegreya' ); ?>>Alegreya</option>
						<option value="Alegreya SC" <?php selected($font_family, 'Alegreya SC' ); ?>>Alegreya SC</option>
						<option value="Alex Brush" <?php selected($font_family, 'Alex Brush' ); ?>>Alex Brush</option>
						<option value="Alfa Slab One" <?php selected($font_family, 'Alfa Slab One' ); ?>>Alfa Slab One</option>
						<option value="Alice" <?php selected($font_family, 'Alice' ); ?>>Alice</option>
						<option value="Alike" <?php selected($font_family, 'Alike' ); ?>>Alike</option>
						<option value="Alike Angular" <?php selected($font_family, 'Alike Angular' ); ?>>Alike Angular</option>
						<option value="Allan" <?php selected($font_family, 'Allan' ); ?>>Allan</option>
						<option value="Allerta" <?php selected($font_family, 'Allerta' ); ?>>Allerta</option>
						<option value="Allerta Stencil"<?php selected($font_family, 'Allerta Stencil' ); ?>>Allerta Stencil</option>
						<option value="Allura" <?php selected($font_family, 'Allura' ); ?>>Allura</option>
						<option value="Almendra"<?php selected($font_family, 'Almendra' ); ?>>Almendra</option>
						<option value="Almendra SC"<?php selected($font_family, 'Almendra SC' ); ?>>Almendra SC</option>
						<option value="Amaranth"<?php selected($font_family, 'Amaranth' ); ?>>Amaranth</option>
						<option value="Amatic SC"<?php selected($font_family, 'Amatic SC' ); ?>>Amatic SC</option>
						<option value="Amethysta"<?php selected($font_family, 'Amethysta' ); ?>>Amethysta</option>
						<option value="Andada"<?php selected($font_family, 'Andada' ); ?>>Andada</option>
						<option value="Andika"<?php selected($font_family, 'Andika' ); ?>>Andika</option>
						<option value="Angkor"<?php selected($font_family, 'Angkor' ); ?>>Angkor</option>
						<option value="Annie Use Your Telescope" <?php selected($font_family, 'Annie Use Your Telescope' ); ?>>Annie Use Your Telescope</option>
						<option value="Anonymous Pro" <?php selected($font_family, 'Anonymous Pro' ); ?>>Anonymous Pro</option>
						<option value="Antic" <?php selected($font_family, 'Antic' ); ?>>Antic</option>
						<option value="Antic Didone" <?php selected($font_family, 'Antic Didone' ); ?>>Antic Didone</option>
						<option value="Antic Slab" <?php selected($font_family, 'Antic Slab' ); ?>>Antic Slab</option>
						<option value="Anton" <?php selected($font_family, 'Anton' ); ?>>Anton</option>
						<option value="Arapey" <?php selected($font_family, 'Arapey' ); ?>>Arapey</option>
						<option value="Arbutus" <?php selected($font_family, 'Arbutus' ); ?>>Arbutus</option>
						<option value="Architects Daughter" <?php selected($font_family, 'Architects Daughter' ); ?>>Architects Daughter</option>
						<option value="Arimo" <?php selected($font_family, 'Arimo' ); ?>>Arimo</option>
						<option value="Arizonia" <?php selected($font_family, 'Arizonia' ); ?>>Arizonia</option>
						<option value="Armata" <?php selected($font_family, 'Armata' ); ?>>Armata</option>
						<option value="Artifika" <?php selected($font_family, 'Artifika' ); ?>>Artifika</option>
						<option value="Arvo" <?php selected($font_family, 'Arvo' ); ?>>Arvo</option>
						<option value="Asap" <?php selected($font_family, 'Asap' ); ?>>Asap</option>
						<option value="Asset" <?php selected($font_family, 'Asset' ); ?>>Asset</option>
						<option value="Astloch" <?php selected($font_family, 'Astloch' ); ?>>Astloch</option>
						<option value="Asul" <?php selected($font_family, 'Asul' ); ?>>Asul</option>
						<option value="Atomic Age" <?php selected($font_family, 'Atomic Age' ); ?>>Atomic Age</option>
						<option value="Aubrey" <?php selected($font_family, 'Aubrey' ); ?>>Aubrey</option>
						<option value="Audiowide" <?php selected($font_family, 'Audiowide' ); ?>>Audiowide</option>
						<option value="Average" <?php selected($font_family, 'Average' ); ?>>Average</option>
						<option value="Averia Gruesa Libre" <?php selected($font_family, 'Averia Gruesa Libre' ); ?>>Averia Gruesa Libre</option>
						<option value="Averia Libre" <?php selected($font_family, 'Averia Libre' ); ?>>Averia Libre</option>
						<option value="Averia Sans Libre" <?php selected($font_family, 'Averia Sans Libre' ); ?>>Averia Sans Libre</option>
						<option value="Averia Serif Libre" <?php selected($font_family, 'Averia Serif Libre' ); ?>>Averia Serif Libre</option>
						<option value="Bad Script" <?php selected($font_family, 'Bad Script' ); ?>>Bad Script</option>
						<option value="Balthazar" <?php selected($font_family, 'Balthazar' ); ?>>Balthazar</option>
						<option value="Bangers" <?php selected($font_family, 'Bangers' ); ?>>Bangers</option>
						<option value="Basic" <?php selected($font_family, 'Basic' ); ?>>Basic</option>
						<option value="Battambang" <?php selected($font_family, 'Battambang' ); ?>>Battambang</option>
						<option value="Baumans" <?php selected($font_family, 'Baumans' ); ?>>Baumans</option>
						<option value="Bayon" <?php selected($font_family, 'Bayon' ); ?>>Bayon</option>
						<option value="Belgrano"<?php selected($font_family, 'Belgrano' ); ?>>Belgrano</option>
						<option value="Belleza" <?php selected($font_family, 'Belleza' ); ?>>Belleza</option>
						<option value="Bentham" <?php selected($font_family, 'Bentham' ); ?>>Bentham</option>
						<option value="Berkshire Swash"<?php selected($font_family, 'Berkshire Swash' ); ?>>Berkshire Swash</option>
						<option value="Bevan"  <?php selected($font_family, 'Bevan' ); ?>>Bevan</option>
						<option value="Bigshot One"<?php selected($font_family, 'Bigshot One' ); ?>>Bigshot One</option>
						<option value="Bilbo" <?php selected($font_family, 'Bilbo' ); ?>>Bilbo</option>
						<option value="Bilbo Swash Caps" <?php selected($font_family, 'Bilbo Swash Caps' ); ?>>Bilbo Swash Caps</option>
						<option value="Bitter" <?php selected($font_family, 'Bitter' ); ?>>Bitter</option>
						<option value="Black Ops One" <?php selected($font_family, 'Black Ops One' ); ?>>Black Ops One</option>
						<option value="Bokor" <?php selected($font_family, 'Bokor' ); ?>>Bokor</option>
						<option value="Bonbon" <?php selected($font_family, 'Bonbon' ); ?>>Bonbon</option>
						<option value="Boogaloo" <?php selected($font_family, 'Boogaloo' ); ?>>Boogaloo</option>
						<option value="Bowlby One" <?php selected($font_family, 'Bowlby One' ); ?>>Bowlby One</option>
						<option value="Bowlby One SC" <?php selected($font_family, 'Bowlby One SC' ); ?>>Bowlby One SC</option>
						<option value="Brawler" <?php selected($font_family, 'Brawler' ); ?>>Brawler</option>
						<option value="Bree Serif" <?php selected($font_family, 'Bree Serif' ); ?>>Bree Serif</option>
						<option value="Bubblegum Sans"  <?php selected($font_family, 'Bubblegum Sans' ); ?>>Bubblegum Sans</option>
						<option value="Buda"  <?php selected($font_family, 'Buda' ); ?>>Buda</option>
						<option value="Buenard"  <?php selected($font_family, 'Buenard' ); ?>>Buenard</option>
						<option value="Butcherman"  <?php selected($font_family, 'Butcherman' ); ?>>Butcherman</option>
						<option value="Butterfly Kids" <?php selected($font_family, 'Butterfly Kids' ); ?>>Butterfly Kids</option>
						<option value="Cabin"  <?php selected($font_family, 'Cabin' ); ?>>Cabin</option>
						<option value="Cabin Condensed"  <?php selected($font_family, 'Cabin Condensed' ); ?>>Cabin Condensed</option>
						<option value="Cabin Sketch"  <?php selected($font_family, 'Cabin Sketch' ); ?>>Cabin Sketch</option>
						<option value="Caesar Dressing"  <?php selected($font_family, 'Caesar Dressing' ); ?>>Caesar Dressing</option>
						<option value="Cagliostro"  <?php selected($font_family, 'Cagliostro' ); ?>>Cagliostro</option>
						<option value="Calligraffitti"  <?php selected($font_family, 'Calligraffitti' ); ?>>Calligraffitti</option>
						<option value="Cambo"  <?php selected($font_family, 'Cambo' ); ?>>Cambo</option>
						<option value="Candal"  <?php selected($font_family, 'Candal' ); ?>>Candal</option>
						<option value="Cantarell"  <?php selected($font_family, 'Cantarell' ); ?>>Cantarell</option>
						<option value="Cantata One"  <?php selected($font_family, 'Cantata One' ); ?>>Cantata One</option>
						<option value="Cardo"  <?php selected($font_family, 'Cardo' ); ?>>Cardo</option>
						<option value="Carme"  <?php selected($font_family, 'Carme' ); ?>>Carme</option>
						<option value="Carter One"  <?php selected($font_family, 'Carter One' ); ?>>Carter One</option>
						<option value="Caudex"  <?php selected($font_family, 'Caudex' ); ?>>Caudex</option>
						<option value="Cedarville Cursive"  <?php selected($font_family, 'Cedarville Cursive' ); ?>>Cedarville Cursive</option>
						<option value="Ceviche One"  <?php selected($font_family, 'Ceviche One' ); ?>>Ceviche One</option>
						<option value="Changa One"  <?php selected($font_family, 'Changa One' ); ?>>Changa One</option>
						<option value="Chango"  <?php selected($font_family, 'Chango' ); ?>>Chango</option>
						<option value="Chau Philomene One"  <?php selected($font_family, 'Chau Philomene One' ); ?>>Chau Philomene One</option>
						<option value="Chelsea Market"  <?php selected($font_family, 'Chelsea Market' ); ?>>Chelsea Market</option>
						<option value="Chenla"  <?php selected($font_family, 'Chenla' ); ?>>Chenla</option>
						<option value="Cherry Cream Soda"  <?php selected($font_family, 'Cherry Cream Soda' ); ?>>Cherry Cream Soda</option>
						<option value="Chewy"  <?php selected($font_family, 'Chewy' ); ?>>Chewy</option>
						<option value="Chicle"  <?php selected($font_family, 'Chicle' ); ?>>Chicle</option>
						<option value="Chivo"  <?php selected($font_family, 'Chivo' ); ?>>Chivo</option>
						<option value="Coda"  <?php selected($font_family, 'Coda' ); ?>>Coda</option>
						<option value="Coda Caption"  <?php selected($font_family, 'Coda Caption' ); ?>>Coda Caption</option>
						<option value="Codystar"  <?php selected($font_family, 'Codystar' ); ?>>Codystar</option>
						<option value="Comfortaa"  <?php selected($font_family, 'Comfortaa' ); ?>>Comfortaa</option>
						<option value="Coming Soon"  <?php selected($font_family, 'Coming Soon' ); ?>>Coming Soon</option>
						<option value="Concert One"  <?php selected($font_family, 'Concert One' ); ?>>Concert One</option>
						<option value="Condiment"  <?php selected($font_family, 'Condiment' ); ?>>Condiment</option>
						<option value="Content"  <?php selected($font_family, 'Content' ); ?>>Content</option>
						<option value="Contrail One"  <?php selected($font_family, 'Contrail One' ); ?>>Contrail One</option>
						<option value="Convergence"  <?php selected($font_family, 'Convergence' ); ?>>Convergence</option>
						<option value="Cookie"  <?php selected($font_family, 'Cookie' ); ?>>Cookie</option>
						<option value="Copse"  <?php selected($font_family, 'Copse' ); ?>>Copse</option>
						<option value="Corben"  <?php selected($font_family, 'Corben' ); ?>>Corben</option>
						<option value="Courgette"  <?php selected($font_family, 'Courgette' ); ?>>Courgette</option>
						<option value="Cousine"  <?php selected($font_family, 'Cousine' ); ?>>Cousine</option>
						<option value="Coustard"  <?php selected($font_family, 'Coustard' ); ?>>Coustard</option>
						<option value="Covered By Your Grace"  <?php selected($font_family, 'Covered By Your Grace' ); ?>>Covered By Your Grace</option>
						<option value="Crafty Girls"  <?php selected($font_family, 'Crafty Girls' ); ?>>Crafty Girls</option>
						<option value="Creepster"  <?php selected($font_family, 'Creepster' ); ?>>Creepster</option>
						<option value="Crete Round"  <?php selected($font_family, 'Crete Round' ); ?>>Crete Round</option>
						<option value="Crimson Text"  <?php selected($font_family, 'Crimson Text' ); ?>>Crimson Text</option>
						<option value="Crushed"  <?php selected($font_family, 'Crushed' ); ?>>Crushed</option>
						<option value="Cuprum"  <?php selected($font_family, 'Cuprum' ); ?>>Cuprum</option>
						<option value="Cutive"  <?php selected($font_family, 'Cutive' ); ?>>Cutive</option>
						<option value="Damion"  <?php selected($font_family, 'Damion' ); ?>>Damion</option>
						<option value="Dancing Script"  <?php selected($font_family, 'Dancing Script' ); ?>>Dancing Script</option>
						<option value="Dangrek"  <?php selected($font_family, 'Dangrek' ); ?>>Dangrek</option>
						<option value="Dawning of a New Day"  <?php selected($font_family, 'Dawning of a New Day' ); ?>>Dawning of a New Day</option>
						<option value="Days One"  <?php selected($font_family, 'Days One' ); ?>>Days One</option>
						<option value="Delius"  <?php selected($font_family, 'Delius' ); ?>>Delius</option>
						<option value="Delius Swash Caps"  <?php selected($font_family, 'Delius Swash Caps' ); ?>>Delius Swash Caps</option>
						<option value="Delius Unicase"  <?php selected($font_family, 'Delius Unicase' ); ?>>Delius Unicase</option>
						<option value="Della Respira"  <?php selected($font_family, 'Della Respira' ); ?>>Della Respira</option>
						<option value="Devonshire"  <?php selected($font_family, 'Devonshire' ); ?>>Devonshire</option>
						<option value="Didact Gothic"  <?php selected($font_family, 'Didact Gothic' ); ?>>Didact Gothic</option>
						<option value="Diplomata"  <?php selected($font_family, 'Diplomata' ); ?>>Diplomata</option>
						<option value="Diplomata SC"  <?php selected($font_family, 'Diplomata SC' ); ?>>Diplomata SC</option>
						<option value="Doppio One"  <?php selected($font_family, 'Doppio One' ); ?>>Doppio One</option>
						<option value="Dorsa"  <?php selected($font_family, 'Dorsa' ); ?>>Dorsa</option>
						<option value="Dosis"  <?php selected($font_family, 'Dosis' ); ?>>Dosis</option>
						<option value="Dr Sugiyama"  <?php selected($font_family, 'Dr Sugiyama' ); ?>>Dr Sugiyama</option>
						<option value="Droid Sans"  <?php selected($font_family, 'Droid Sans' ); ?>>Droid Sans</option>
						<option value="Droid Sans Mono"  <?php selected($font_family, 'Droid Sans Mono' ); ?>>Droid Sans Mono</option>
						<option value="Droid Serif" <?php selected($font_family, 'Droid Serif' ); ?>>Droid Serif</option>
						<option value="Duru Sans" <?php selected($font_family, 'Duru Sans' ); ?>>Duru Sans</option>
						<option value="Dynalight" <?php selected($font_family, 'Dynalight' ); ?>>Dynalight</option>
						<option value="EB Garamond" <?php selected($font_family, 'EB Garamond' ); ?>>EB Garamond</option>
						<option value="Eater" <?php selected($font_family, 'Eater' ); ?>>Eater</option>
						<option value="Economica" <?php selected($font_family, 'Economica' ); ?>>Economica</option>
						<option value="Electrolize" <?php selected($font_family, 'Electrolize' ); ?>>Electrolize</option>
						<option value="Emblema One" <?php selected($font_family, 'Emblema One' ); ?>>Emblema One</option>
						<option value="Emilys Candy" <?php selected($font_family, 'Emilys Candy' ); ?>>Emilys Candy</option>
						<option value="Engagement" <?php selected($font_family, 'Engagement' ); ?>>Engagement</option>
						<option value="Enriqueta" <?php selected($font_family, 'Enriqueta' ); ?>>Enriqueta</option>
						<option value="Erica One" <?php selected($font_family, 'Erica One' ); ?>>Erica One</option>
						<option value="Esteban" <?php selected($font_family, 'Esteban' ); ?>>Esteban</option>
						<option value="Euphoria Script">Euphoria Script</option>
						<option value="Ewert" <?php selected($font_family, 'Ewert' ); ?>>Ewert</option>
						<option value="Exo" <?php selected($font_family, 'Exo' ); ?>>Exo</option>
						<option value="Expletus Sans" <?php selected($font_family, 'Expletus Sans' ); ?>>Expletus Sans</option>
						<option value="Fanwood Text" <?php selected($font_family, 'Fanwood Text' ); ?>>Fanwood Text</option>
						<option value="Fascinate" <?php selected($font_family, 'Fascinate' ); ?>>Fascinate</option>
						<option value="Fascinate Inline" <?php selected($font_family, 'Fascinate Inline' ); ?>>Fascinate Inline</option>
						<option value="Federant" <?php selected($font_family, 'Federant' ); ?>>Federant</option>
						<option value="Federo" <?php selected($font_family, 'Federo' ); ?>>Federo</option>
						<option value="Felipa" <?php selected($font_family, 'Felipa' ); ?>>Felipa</option>
						<option value="Fjord One" <?php selected($font_family, 'Fjord One' ); ?>>Fjord One</option>
						<option value="Flamenco" <?php selected($font_family, 'Flamenco' ); ?>>Flamenco</option>
						<option value="Flavors" <?php selected($font_family, 'Flavors' ); ?>>Flavors</option>
						<option value="Fondamento" <?php selected($font_family, 'Fondamento' ); ?>>Fondamento</option>
						<option value="Fontdiner Swanky" <?php selected($font_family, 'Fontdiner Swanky' ); ?>>Fontdiner Swanky</option>
						<option value="Forum" <?php selected($font_family, 'Forum' ); ?>>Forum</option>
						<option value="Francois One" <?php selected($font_family, 'Francois One' ); ?>>Francois One</option>
						<option value="Fredericka the Great" <?php selected($font_family, 'Fredericka the Great' ); ?>>Fredericka the Great</option>
						<option value="Fredoka One" <?php selected($font_family, 'Fredoka One' ); ?>>Fredoka One</option>
						<option value="Freehand" <?php selected($font_family, 'Freehand' ); ?>>Freehand</option>
						<option value="Fresca" <?php selected($font_family, 'Fresca' ); ?>>Fresca</option>
						<option value="Frijole" <?php selected($font_family, 'Frijole' ); ?>>Frijole</option>
						<option value="Fugaz One" <?php selected($font_family, 'Fugaz One' ); ?>>Fugaz One</option>
						<option value="GFS Didot" <?php selected($font_family, 'GFS Didot' ); ?>>GFS Didot</option>
						<option value="GFS Neohellenic" <?php selected($font_family, 'GFS Neohellenic' ); ?>>GFS Neohellenic</option>
						<option value="Galdeano" <?php selected($font_family, 'Galdeano' ); ?>>Galdeano</option>
						<option value="Gentium Basic" <?php selected($font_family, 'Gentium Basic' ); ?>>Gentium Basic</option>
						<option value="Gentium Book Basic" <?php selected($font_family, 'Gentium Book Basic' ); ?>>Gentium Book Basic</option>
						<option value="Geo" <?php selected($font_family, 'Geo' ); ?>>Geo</option>
						<option value="Geostar" <?php selected($font_family, 'Geostar' ); ?>>Geostar</option>
						<option value="Geostar Fill" <?php selected($font_family, 'Geostar Fill' ); ?>>Geostar Fill</option>
						<option value="Germania One" <?php selected($font_family, 'Germania One' ); ?>>Germania One</option>
						<option value="Give You Glory" <?php selected($font_family, 'Give You Glory' ); ?>>Give You Glory</option>
						<option value="Glass Antiqua" <?php selected($font_family, 'Glass Antiqua' ); ?>>Glass Antiqua</option>
						<option value="Glegoo" <?php selected($font_family, 'Glegoo' ); ?>>Glegoo</option>
						<option value="Gloria Hallelujah" <?php selected($font_family, 'Gloria Hallelujah' ); ?>>Gloria Hallelujah</option>
						<option value="Goblin One" <?php selected($font_family, 'Goblin One' ); ?>>Goblin One</option>
						<option value="Gochi Hand" <?php selected($font_family, 'Gochi Hand' ); ?>>Gochi Hand</option>
						<option value="Gorditas" <?php selected($font_family, 'Gorditas' ); ?>>Gorditas</option>
						<option value="Goudy Bookletter 1911" <?php selected($font_family, 'Goudy Bookletter 191' ); ?>>Goudy Bookletter 1911</option>
						<option value="Graduate" <?php selected($font_family, 'Graduate' ); ?>>Graduate</option>
						<option value="Gravitas One" <?php selected($font_family, 'Gravitas One' ); ?>>Gravitas One</option>
						<option value="Great Vibes" <?php selected($font_family, 'Great Vibes' ); ?>>Great Vibes</option>
						<option value="Gruppo" <?php selected($font_family, 'Gruppo' ); ?>>Gruppo</option>
						<option value="Gudea" <?php selected($font_family, 'Gudea' ); ?>>Gudea</option>
						<option value="Habibi" <?php selected($font_family, 'Habibi' ); ?>>Habibi</option>
						<option value="Hammersmith One" <?php selected($font_family, 'Hammersmith One' ); ?>>Hammersmith One</option>
						<option value="Handlee" <?php selected($font_family, 'Handlee' ); ?>>Handlee</option>
						<option value="Hanuman" <?php selected($font_family, 'Hanuman' ); ?>>Hanuman</option>
						<option value="Happy Monkey" <?php selected($font_family, 'Happy Monkey' ); ?>>Happy Monkey</option>
						<option value="Henny Penny" <?php selected($font_family, 'Henny Penny' ); ?>>Henny Penny</option>
						<option value="Herr Von Muellerhoff" <?php selected($font_family, 'Herr Von Muellerhoff' ); ?>>Herr Von Muellerhoff</option>
						<option value="Holtwood One SC" <?php selected($font_family, 'Holtwood One SC' ); ?>>Holtwood One SC</option>
						<option value="Homemade Apple" <?php selected($font_family, 'Homemade Apple' ); ?>>Homemade Apple</option>
						<option value="Homenaje" <?php selected($font_family, 'Homenaje' ); ?>>Homenaje</option>
						<option value="IM Fell DW Pica" <?php selected($font_family, 'IM Fell DW Pica' ); ?>>IM Fell DW Pica</option>
						<option value="IM Fell DW Pica SC" <?php selected($font_family, 'IM Fell DW Pica SC' ); ?>>IM Fell DW Pica SC</option>
						<option value="IM Fell Double Pica" <?php selected($font_family, 'IM Fell Double Pica' ); ?>>IM Fell Double Pica</option>
						<option value="IM Fell Double Pica SC" <?php selected($font_family, 'IM Fell Double Pica SC' ); ?>>IM Fell Double Pica SC</option>
						<option value="IM Fell English" <?php selected($font_family, 'IM Fell English' ); ?>>IM Fell English</option>
						<option value="IM Fell English SC" <?php selected($font_family, 'IM Fell English SC' ); ?>>IM Fell English SC</option>
						<option value="IM Fell French Canon" <?php selected($font_family, 'IM Fell French Canon' ); ?>>IM Fell French Canon</option>
						<option value="IM Fell French Canon SC" <?php selected($font_family, 'IM Fell French Canon SC' ); ?>>IM Fell French Canon SC</option>
						<option value="IM Fell Great Primer" <?php selected($font_family, 'IM Fell Great Primer' ); ?>>IM Fell Great Primer</option>
						<option value="IM Fell Great Primer SC" <?php selected($font_family, 'IM Fell Great Primer SC' ); ?>>IM Fell Great Primer SC</option>
						<option value="Iceberg" <?php selected($font_family, 'Iceberg' ); ?>>Iceberg</option>
						<option value="Iceland" <?php selected($font_family, 'Iceland' ); ?>>Iceland</option>
						<option value="Imprima" <?php selected($font_family, 'Imprima' ); ?>>Imprima</option>
						<option value="Inconsolata" <?php selected($font_family, 'Inconsolata' ); ?>>Inconsolata</option>
						<option value="Inder" <?php selected($font_family, 'Inder' ); ?>>Inder</option>
						<option value="Indie Flower" <?php selected($font_family, 'Indie Flower' ); ?>>Indie Flower</option>
						<option value="Inika" <?php selected($font_family, 'Inika' ); ?>>Inika</option>
						<option value="Irish Grover" <?php selected($font_family, 'Irish Grover' ); ?>>Irish Grover</option>
						<option value="Istok Web" <?php selected($font_family, 'Istok Web' ); ?>>Istok Web</option>
						<option value="Italiana" <?php selected($font_family, 'Italiana' ); ?>>Italiana</option>
						<option value="Italianno" <?php selected($font_family, 'Italianno' ); ?>>Italianno</option>
						<option value="Jim Nightshade" <?php selected($font_family, 'Jim Nightshade' ); ?>>Jim Nightshade</option>
						<option value="Jockey One" <?php selected($font_family, 'Jockey One' ); ?>>Jockey One</option>
						<option value="Jolly Lodger" <?php selected($font_family, 'Jolly Lodger' ); ?>>Jolly Lodger</option>
						<option value="Josefin Sans" <?php selected($font_family, 'Josefin Sans' ); ?>>Josefin Sans</option>
						<option value="Josefin Slab" <?php selected($font_family, 'Josefin Slab' ); ?>>Josefin Slab</option>
						<option value="Judson" <?php selected($font_family, 'Judson' ); ?>>Judson</option>
						<option value="Julee" <?php selected($font_family, 'Julee' ); ?>>Julee</option>
						<option value="Junge" <?php selected($font_family, 'Junge' ); ?>>Junge</option>
						<option value="Jura" <?php selected($font_family, 'Jura' ); ?>>Jura</option>
						<option value="Just Another Hand" <?php selected($font_family, 'Just Another Hand' ); ?>>Just Another Hand</option>
						<option value="Just Me Again Down Here" <?php selected($font_family, 'Just Me Again Down Here' ); ?>>Just Me Again Down Here</option>
						<option value="Kameron" <?php selected($font_family, 'Kameron' ); ?>>Kameron</option>
						<option value="Karla" <?php selected($font_family, 'Karla' ); ?>>Karla</option>
						<option value="Kaushan Script" <?php selected($font_family, 'Kaushan Script' ); ?>>Kaushan Script</option>
						<option value="Kelly Slab" <?php selected($font_family, 'Kelly Slab' ); ?>>Kelly Slab</option>
						<option value="Kenia" <?php selected($font_family, 'Kenia' ); ?>>Kenia</option>
						<option value="Khmer" <?php selected($font_family, 'Khmer' ); ?>>Khmer</option>
						<option value="Knewave" <?php selected($font_family, 'Knewave' ); ?>>Knewave</option>
						<option value="Kotta One" <?php selected($font_family, 'Kotta One' ); ?>>Kotta One</option>
						<option value="Koulen" <?php selected($font_family, 'Koulen' ); ?>>Koulen</option>
						<option value="Kranky" <?php selected($font_family, 'Kranky' ); ?>>Kranky</option>
						<option value="Kreon" <?php selected($font_family, 'Kreon' ); ?>>Kreon</option>
						<option value="Kristi" <?php selected($font_family, 'Kristi' ); ?>>Kristi</option>
						<option value="Krona One" <?php selected($font_family, 'Krona One' ); ?>>Krona One</option>
						<option value="La Belle Aurore" <?php selected($font_family, 'La Belle Aurore' ); ?>>La Belle Aurore</option>
						<option value="Lancelot" <?php selected($font_family, 'Lancelot' ); ?>>Lancelot</option>
						<option value="Lato" <?php selected($font_family, 'Lato' ); ?>>Lato</option>
						<option value="League Script" <?php selected($font_family, 'League Script' ); ?>>League Script</option>
						<option value="Leckerli One" <?php selected($font_family, 'Leckerli One' ); ?>>Leckerli One</option>
						<option value="Ledger" <?php selected($font_family, 'Ledger' ); ?>>Ledger</option>
						<option value="Lekton" <?php selected($font_family, 'Lekton' ); ?>>Lekton</option>
						<option value="Lemon" <?php selected($font_family, 'Lemon' ); ?>>Lemon</option>
						<option value="Lilita One" <?php selected($font_family, 'Lilita One' ); ?>>Lilita One</option>
						<option value="Limelight" <?php selected($font_family, 'Limelight' ); ?>>Limelight</option>
						<option value="Linden Hill" <?php selected($font_family, 'Linden Hill' ); ?>>Linden Hill</option>
						<option value="Lobster" <?php selected($font_family, 'Lobster' ); ?>>Lobster</option>
						<option value="Lobster Two" <?php selected($font_family, 'Lobster Two' ); ?>>Lobster Two</option>
						<option value="Londrina Outline" <?php selected($font_family, 'Londrina Outline' ); ?>>Londrina Outline</option>
						<option value="Londrina Shadow" <?php selected($font_family, 'Londrina Shadow' ); ?>>Londrina Shadow</option>
						<option value="Londrina Sketch" <?php selected($font_family, 'Londrina Sketch' ); ?>>Londrina Sketch</option>
						<option value="Londrina Solid" <?php selected($font_family, 'Londrina Solid' ); ?>>Londrina Solid</option>
						<option value="Lora" <?php selected($font_family, 'Lora' ); ?>>Lora</option>
						<option value="Love Ya Like A Sister" <?php selected($font_family, 'Love Ya Like A Sister' ); ?>>Love Ya Like A Sister</option>
						<option value="Loved by the King" <?php selected($font_family, 'Loved by the King' ); ?>>Loved by the King</option>
						<option value="Lovers Quarrel" <?php selected($font_family, 'Lovers Quarrel' ); ?>>Lovers Quarrel</option>
						<option value="Luckiest Guy" <?php selected($font_family, 'Luckiest Guy' ); ?>>Luckiest Guy</option>
						<option value="Lusitana" <?php selected($font_family, 'Lusitana' ); ?>>Lusitana</option>
						<option value="Lustria" <?php selected($font_family, 'Lustria' ); ?>>Lustria</option>
						<option value="Macondo" <?php selected($font_family, 'Macondo' ); ?>>Macondo</option>
						<option value="Macondo Swash Caps" <?php selected($font_family, 'Macondo Swash Caps' ); ?>>Macondo Swash Caps</option>
						<option value="Magra" <?php selected($font_family, 'Magra' ); ?>>Magra</option>
						<option value="Maiden Orange" <?php selected($font_family, 'Maiden Orange' ); ?>>Maiden Orange</option>
						<option value="Mako" <?php selected($font_family, 'Mako' ); ?>>Mako</option>
						<option value="Marck Script" <?php selected($font_family, 'Marck Script' ); ?>>Marck Script</option>
						<option value="Marko One" <?php selected($font_family, 'Marko One' ); ?>>Marko One</option>
						<option value="Marmelad" <?php selected($font_family, 'Marmelad' ); ?>>Marmelad</option>
						<option value="Marvel" <?php selected($font_family, 'Marvel' ); ?>>Marvel</option>
						<option value="Mate" <?php selected($font_family, 'Mate' ); ?>>Mate</option>
						<option value="Mate SC" <?php selected($font_family, 'Mate SC' ); ?>>Mate SC</option>
						<option value="Maven Pro" <?php selected($font_family, 'Maven Pro' ); ?>>Maven Pro</option>
						<option value="Meddon" <?php selected($font_family, 'Meddon' ); ?>>Meddon</option>
						<option value="MedievalSharp" <?php selected($font_family, 'MedievalSharp' ); ?>>MedievalSharp</option>
						<option value="Medula One" <?php selected($font_family, 'Medula One' ); ?>>Medula One</option>
						<option value="Megrim" <?php selected($font_family, 'Megrim' ); ?>>Megrim</option>
						<option value="Merienda One" <?php selected($font_family, 'Merienda One' ); ?>>Merienda One</option>
						<option value="Merriweather" <?php selected($font_family, 'Merriweather' ); ?>>Merriweather</option>
						<option value="Metal" <?php selected($font_family, 'Metal' ); ?>>Metal</option>
						<option value="Metamorphous"<?php selected($font_family, 'Metamorphous' ); ?>>Metamorphous</option>
						<option value="Metrophobic" <?php selected($font_family, 'Metrophobic' ); ?>>Metrophobic</option>
						<option value="Michroma" <?php selected($font_family, 'Michroma' ); ?>>Michroma</option>
						<option value="Miltonian" <?php selected($font_family, 'Miltonian' ); ?>>Miltonian</option>
						<option value="Miltonian Tattoo" <?php selected($font_family, 'Miltonian Tattoo' ); ?>>Miltonian Tattoo</option>
						<option value="Miniver" <?php selected($font_family, 'Miniver' ); ?>>Miniver</option>
						<option value="Miss Fajardose" <?php selected($font_family, 'Miss Fajardose' ); ?>>Miss Fajardose</option>
						<option value="Modern Antiqua" <?php selected($font_family, 'Modern Antiqua' ); ?>>Modern Antiqua</option>
						<option value="Molengo" <?php selected($font_family, 'Molengo' ); ?>>Molengo</option>
						<option value="Monofett" <?php selected($font_family, 'Monofett' ); ?>>Monofett</option>
						<option value="Monoton" <?php selected($font_family, 'Monoton' ); ?>>Monoton</option>
						<option value="Monsieur La Doulaise" <?php selected($font_family, 'Monsieur La Doulaise' ); ?>>Monsieur La Doulaise</option>
						<option value="Montaga" <?php selected($font_family, 'Montaga' ); ?>>Montaga</option>
						<option value="Montez" <?php selected($font_family, 'Montez' ); ?>>Montez</option>
						<option value="Montserrat" <?php selected($font_family, 'Montserrat' ); ?>>Montserrat</option>
						<option value="Moul" <?php selected($font_family, 'Moul' ); ?>>Moul</option>
						<option value="Moulpali" <?php selected($font_family, 'Moulpali' ); ?>>Moulpali</option>
						<option value="Mountains of Christmas" <?php selected($font_family, 'Mountains of Christmas' ); ?>>Mountains of Christmas</option>
						<option value="Mr Bedfort" <?php selected($font_family, 'Mr Bedfort' ); ?>>Mr Bedfort</option>
						<option value="Mr Dafoe" <?php selected($font_family, 'Mr Dafoe' ); ?>>Mr Dafoe</option>
						<option value="Mr De Haviland" <?php selected($font_family, 'Mr De Haviland' ); ?>>Mr De Haviland</option>
						<option value="Mrs Saint Delafield" <?php selected($font_family, 'Mrs Saint Delafield' ); ?>>Mrs Saint Delafield</option>
						<option value="Mrs Sheppards" <?php selected($font_family, 'Mrs Sheppards' ); ?>>Mrs Sheppards</option>
						<option value="Muli" <?php selected($font_family, 'Muli' ); ?>>Muli</option>
						<option value="Mystery Quest" <?php selected($font_family, 'Mystery Quest' ); ?>>Mystery Quest</option>
						<option value="Neucha" <?php selected($font_family, 'Neucha' ); ?>>Neucha</option>
						<option value="Neuton" <?php selected($font_family, 'Neuton' ); ?>>Neuton</option>
						<option value="News Cycle" <?php selected($font_family, 'News Cycle' ); ?>>News Cycle</option>
						<option value="Niconne" <?php selected($font_family, 'Niconne' ); ?>>Niconne</option>
						<option value="Nixie One" <?php selected($font_family, 'Nixie One' ); ?>>Nixie One</option>
						<option value="Nobile" <?php selected($font_family, 'Nobile' ); ?>>Nobile</option>
						<option value="Nokora" <?php selected($font_family, 'Nokora' ); ?>>Nokora</option>
						<option value="Norican" <?php selected($font_family, 'Norican' ); ?>>Norican</option>
						<option value="Nosifer" <?php selected($font_family, 'Nosifer' ); ?>>Nosifer</option>
						<option value="Nothing You Could Do" <?php selected($font_family, 'Nothing You Could Do' ); ?>>Nothing You Could Do</option>
						<option value="Noticia Text" <?php selected($font_family, 'Noticia Text' ); ?>>Noticia Text</option>
						<option value="Nova Cut" <?php selected($font_family, 'Nova Cut' ); ?>>Nova Cut</option>
						<option value="Nova Flat" <?php selected($font_family, 'Nova Flat' ); ?>>Nova Flat</option>
						<option value="Nova Mono" <?php selected($font_family, 'Nova Mono' ); ?>>Nova Mono</option>
						<option value="Nova Oval" <?php selected($font_family, 'Nova Oval' ); ?>>Nova Oval</option>
						<option value="Nova Round" <?php selected($font_family, 'Nova Round' ); ?>>Nova Round</option>
						<option value="Nova Script" <?php selected($font_family, 'Nova Script' ); ?>>Nova Script</option>
						<option value="Nova Slim" <?php selected($font_family, 'Nova Slim' ); ?>>Nova Slim</option>
						<option value="Nova Square" <?php selected($font_family, 'Nova Square' ); ?>>Nova Square</option>
						<option value="Numans" <?php selected($font_family, 'Numans' ); ?>>Numans</option>

						<option value="Nunito" <?php selected($font_family, 'Nunito' ); ?>>Nunito</option>
						<option value="Odor Mean Chey" <?php selected($font_family, 'Odor Mean Chey' ); ?>>Odor Mean Chey</option>
						<option value="Old Standard TT" <?php selected($font_family, 'Old Standard TT' ); ?>>Old Standard TT</option>
						<option value="Oldenburg" <?php selected($font_family, 'Oldenburg' ); ?>>Oldenburg</option>
						<option value="Oleo Script" <?php selected($font_family, 'Oleo Script' ); ?>>Oleo Script</option>
						<option value="Orbitron" <?php selected($font_family, 'Orbitron' ); ?>>Orbitron</option>
						<option value="Original Surfer" <?php selected($font_family, 'Original Surfer' ); ?>>Original Surfer</option>
						<option value="Oswald" <?php selected($font_family, 'Oswald' ); ?>>Oswald</option>
						<option value="Over the Rainbow" <?php selected($font_family, 'Over the Rainbow' ); ?>>Over the Rainbow</option>
						<option value="Overlock" <?php selected($font_family, 'Overlock' ); ?>>Overlock</option>
						<option value="Overlock SC" <?php selected($font_family, 'Overlock SC' ); ?>>Overlock SC</option>
						<option value="Ovo" <?php selected($font_family, 'Ovo' ); ?>>Ovo</option>
						<option value="Oxygen" <?php selected($font_family, 'Oxygen' ); ?>>Oxygen</option>
						<option value="PT Mono" <?php selected($font_family, 'PT Mono' ); ?>>PT Mono</option>
						<option value="PT Sans" <?php selected($font_family, 'PT Sans' ); ?>>PT Sans</option>
						<option value="PT Sans Caption" <?php selected($font_family, 'PT Sans Caption' ); ?>>PT Sans Caption</option>
						<option value="PT Sans Narrow" <?php selected($font_family, 'PT Sans Narrow' ); ?>>PT Sans Narrow</option>
						<option value="PT Serif" <?php selected($font_family, 'PT Serif' ); ?>>PT Serif</option>
						<option value="PT Serif Caption" <?php selected($font_family, 'PT Serif Caption' ); ?>>PT Serif Caption</option>
						<option value="Pacifico" <?php selected($font_family, 'Pacifico' ); ?>>Pacifico</option>
						<option value="Parisienne" <?php selected($font_family, 'Parisienne' ); ?>>Parisienne</option>
						<option value="Passero One" <?php selected($font_family, 'Passero One' ); ?>>Passero One</option>
						<option value="Passion One" <?php selected($font_family, 'Passion One' ); ?>>Passion One</option>
						<option value="Patrick Hand" <?php selected($font_family, 'Patrick Hand' ); ?>>Patrick Hand</option>
						<option value="Patua One" <?php selected($font_family, 'Patua One' ); ?>>Patua One</option>
						<option value="Paytone One" <?php selected($font_family, 'Paytone One' ); ?>>Paytone One</option>
						<option value="Permanent Marker" <?php selected($font_family, 'Permanent Marker' ); ?>>Permanent Marker</option>
						<option value="Petrona" <?php selected($font_family, 'Petrona' ); ?>>Petrona</option>
						<option value="Philosopher" <?php selected($font_family, 'Philosopher' ); ?>>Philosopher</option>
						<option value="Piedra" <?php selected($font_family, 'Piedra' ); ?>>Piedra</option>
						<option value="Pinyon Script" <?php selected($font_family, 'Pinyon Script' ); ?>>Pinyon Script</option>
						<option value="Plaster" <?php selected($font_family, 'Plaster' ); ?>>Plaster</option>
						<option value="Play" <?php selected($font_family, 'Play' ); ?>>Play</option>
						<option value="Playball" <?php selected($font_family, 'Playball' ); ?>>Playball</option>
						<option value="Playfair Display" <?php selected($font_family, 'Playfair Display' ); ?>>Playfair Display</option>
						<option value="Podkova" <?php selected($font_family, 'Podkova' ); ?>>Podkova</option>
						<option value="Poiret One" <?php selected($font_family, 'Poiret One' ); ?>>Poiret One</option>
						<option value="Poller One" <?php selected($font_family, 'Poller One' ); ?>>Poller One</option>
						<option value="Poly" <?php selected($font_family, 'Poly' ); ?>>Poly</option>
						<option value="Pompiere" <?php selected($font_family, 'Pompiere' ); ?>>Pompiere</option>
						<option value="Pontano Sans" <?php selected($font_family, 'Pontano Sans' ); ?>>Pontano Sans</option>
						<option value="Port Lligat Sans" <?php selected($font_family, 'Port Lligat Sans' ); ?>>Port Lligat Sans</option>
						<option value="Port Lligat Slab" <?php selected($font_family, 'Port Lligat Slab' ); ?>>Port Lligat Slab</option>
						<option value="Prata" <?php selected($font_family, 'Prata' ); ?>>Prata</option>
						<option value="Preahvihear" <?php selected($font_family, 'Preahvihear' ); ?>>Preahvihear</option>
						<option value="Press Start 2P" <?php selected($font_family, 'Press Start 2P' ); ?>>Press Start 2P</option>
						<option value="Princess Sofia" <?php selected($font_family, 'Princess Sofia' ); ?>>Princess Sofia</option>
						<option value="Prociono" <?php selected($font_family, 'Prociono' ); ?>>Prociono</option>
						<option value="Prosto One" <?php selected($font_family, 'Prosto One' ); ?>>Prosto One</option>
						<option value="Puritan" <?php selected($font_family, 'Puritan' ); ?>>Puritan</option>
						<option value="Quantico" <?php selected($font_family, 'Quantico' ); ?>>Quantico</option>
						<option value="Quattrocento" <?php selected($font_family, 'Quattrocento' ); ?>>Quattrocento</option>
						<option value="Quattrocento Sans" <?php selected($font_family, 'Quattrocento Sans' ); ?>>Quattrocento Sans</option>
						<option value="Questrial" <?php selected($font_family, 'Questrial' ); ?>>Questrial</option>
						<option value="Quicksand" <?php selected($font_family, 'Quicksand' ); ?>>Quicksand</option>
						<option value="Qwigley" <?php selected($font_family, 'Qwigley' ); ?>>Qwigley</option>
						<option value="Radley" <?php selected($font_family, 'Radley' ); ?>>Radley</option>
						<option value="Raleway" <?php selected($font_family, 'Raleway' ); ?>>Raleway</option>
						<option value="Rammetto One" <?php selected($font_family, 'Rammetto One' ); ?>>Rammetto One</option>
						<option value="Rancho" <?php selected($font_family, 'Rancho' ); ?>>Rancho</option>
						<option value="Rationale" <?php selected($font_family, 'Rationale' ); ?>>Rationale</option>
						<option value="Redressed" <?php selected($font_family, 'Redressed' ); ?>>Redressed</option>
						<option value="Reenie Beanie" <?php selected($font_family, 'Reenie Beanie' ); ?>>Reenie Beanie</option>
						<option value="Revalia" <?php selected($font_family, 'Revalia' ); ?>>Revalia</option>
						<option value="Ribeye" <?php selected($font_family, 'Ribeye' ); ?>>Ribeye</option>
						<option value="Ribeye Marrow" <?php selected($font_family, 'Ribeye Marrow' ); ?>>Ribeye Marrow</option>
						<option value="Righteous" <?php selected($font_family, 'Righteous' ); ?>>Righteous</option>
						<option value="Roboto" <?php selected($font_family, 'Roboto' ); ?>>Roboto</option>
						<option value="Rochester" <?php selected($font_family, 'Rochester' ); ?>>Rochester</option>
						<option value="Rock Salt" <?php selected($font_family, 'Rock Salt' ); ?>>Rock Salt</option>
						<option value="Rokkitt" <?php selected($font_family, 'Rokkitt' ); ?>>Rokkitt</option>
						<option value="Ropa Sans" <?php selected($font_family, 'Ropa Sans' ); ?>>Ropa Sans</option>
						<option value="Rosario" <?php selected($font_family, 'Rosario' ); ?>>Rosario</option>
						<option value="Rosarivo" <?php selected($font_family, 'Rosarivo' ); ?>>Rosarivo</option>
						<option value="Rouge Script" <?php selected($font_family, 'Rouge Script' ); ?>>Rouge Script</option>
						<option value="Ruda" <?php selected($font_family, 'Ruda' ); ?>>Ruda</option>
						<option value="Ruge Boogie" <?php selected($font_family, 'Ruge Boogie' ); ?>>Ruge Boogie</option>
						<option value="Ruluko" <?php selected($font_family, 'Ruluko' ); ?>>Ruluko</option>
						<option value="Ruslan Display" <?php selected($font_family, 'Ruslan Display' ); ?>>Ruslan Display</option>
						<option value="Russo One" <?php selected($font_family, 'Russo One' ); ?>>Russo One</option>
						<option value="Ruthie" <?php selected($font_family, 'Ruthie' ); ?>>Ruthie</option>
						<option value="Sail" <?php selected($font_family, 'Sail' ); ?>>Sail</option>
						<option value="Salsa" <?php selected($font_family, 'Salsa' ); ?>>Salsa</option>
						<option value="Sancreek" <?php selected($font_family, 'Sancreek' ); ?>>Sancreek</option>
						<option value="Sansita One" <?php selected($font_family, 'Sansita One' ); ?>>Sansita One</option>
						<option value="Sarina" <?php selected($font_family, 'Sarina' ); ?>>Sarina</option>
						<option value="Satisfy" <?php selected($font_family, 'Satisfy' ); ?>>Satisfy</option>
						<option value="Schoolbell" <?php selected($font_family, 'Schoolbell' ); ?>>Schoolbell</option>
						<option value="Seaweed Script" <?php selected($font_family, 'Seaweed Script' ); ?>>Seaweed Script</option>
						<option value="Sevillana" <?php selected($font_family, 'Sevillana' ); ?>>Sevillana</option>
						<option value="Shadows Into Light" <?php selected($font_family, 'hadows Into Light' ); ?>>Shadows Into Light</option>
						<option value="Shadows Into Light Two" <?php selected($font_family, 'Shadows Into Light Two' ); ?>>Shadows Into Light Two</option>
						<option value="Shanti" <?php selected($font_family, 'Shanti' ); ?>>Shanti</option>
						<option value="Share">Share</option>
						<option value="Shojumaru" <?php selected($font_family, 'Shojumaru' ); ?>>Shojumaru</option>
						<option value="Short Stack" <?php selected($font_family, 'Short Stack' ); ?>>Short Stack</option>
						<option value="Siemreap"<?php selected($font_family, 'Siemreap' ); ?>>Siemreap</option>
						<option value="Sigmar One" <?php selected($font_family, 'Sigmar One' ); ?>>Sigmar One</option>
						<option value="Signika"<?php selected($font_family, 'Signika' ); ?>>Signika</option>
						<option value="Signika Negative" <?php selected($font_family, 'Signika Negative' ); ?>>Signika Negative</option>
						<option value="Simonetta" <?php selected($font_family, 'Simonetta' ); ?>>Simonetta</option>
						<option value="Sirin Stencil" <?php selected($font_family, 'Sirin Stencil' ); ?>>Sirin Stencil</option>
						<option value="Six Caps" <?php selected($font_family, 'Six Caps' ); ?>>Six Caps</option>
						<option value="Slackey" <?php selected($font_family, 'Slackey' ); ?>>Slackey</option>
						<option value="Smokum" <?php selected($font_family, 'Smokum' ); ?>>Smokum</option>
						<option value="Smythe" <?php selected($font_family, 'Smythe' ); ?>>Smythe</option>
						<option value="Sniglet" <?php selected($font_family, 'Sniglet' ); ?>>Sniglet</option>
						<option value="Snippet" <?php selected($font_family, 'Snippet' ); ?>>Snippet</option>
						<option value="Sofia" <?php selected($font_family, 'Sofia' ); ?>>Sofia</option>
						<option value="Sonsie One" <?php selected($font_family, 'Sonsie One' ); ?>>Sonsie One</option>
						<option value="Sorts Mill Goudy" <?php selected($font_family, 'Sorts Mill Goudy' ); ?>>Sorts Mill Goudy</option>
						<option value="Special Elite" <?php selected($font_family, 'Special Elite' ); ?>>Special Elite</option>
						<option value="Spicy Rice" <?php selected($font_family, 'Spicy Rice' ); ?>>Spicy Rice</option>
						<option value="Spinnaker" <?php selected($font_family, 'Spinnaker' ); ?>>Spinnaker</option>
						<option value="Spirax" <?php selected($font_family, 'Spirax' ); ?>>Spirax</option>
						<option value="Squada One" <?php selected($font_family, 'Squada One' ); ?>>Squada One</option>
						<option value="Stardos Stencil" <?php selected($font_family, 'Stardos Stencil' ); ?>>Stardos Stencil</option>
						<option value="Stint Ultra Condensed" <?php selected($font_family, 'Stint Ultra Condensed' ); ?>>Stint Ultra Condensed</option>
						<option value="Stint Ultra Expanded" <?php selected($font_family, 'Stint Ultra Expanded' ); ?>>Stint Ultra Expanded</option>
						<option value="Stoke" <?php selected($font_family, 'Stoke' ); ?>>Stoke</option>
						<option value="Sue Ellen Francisco" <?php selected($font_family, 'Sue Ellen Francisco' ); ?>>Sue Ellen Francisco</option>
						<option value="Sunshiney" <?php selected($font_family, 'Sunshiney' ); ?>>Sunshiney</option>
						<option value="Supermercado One" <?php selected($font_family, 'Supermercado One' ); ?>>Supermercado One</option>
						<option value="Suwannaphum" <?php selected($font_family, 'Suwannaphum' ); ?>>Suwannaphum</option>
						<option value="Swanky and Moo Moo" <?php selected($font_family, 'Swanky and Moo Moo' ); ?>>Swanky and Moo Moo</option>
						<option value="Syncopate" <?php selected($font_family, 'Syncopate' ); ?>>Syncopate</option>
						<option value="Tangerine" <?php selected($font_family, 'Tangerine' ); ?>>Tangerine</option>
						<option value="Taprom" <?php selected($font_family, 'Taprom' ); ?>>Taprom</option>
						<option value="Telex" <?php selected($font_family, 'Telex' ); ?>>Telex</option>
						<option value="Tenor Sans" <?php selected($font_family, 'Tenor Sans' ); ?>>Tenor Sans</option>
						<option value="The Girl Next Door" <?php selected($font_family, 'The Girl Next Door' ); ?>>The Girl Next Door</option>
						<option value="Tienne" <?php selected($font_family, 'Tienne' ); ?>>Tienne</option>
						<option value="Tinos" <?php selected($font_family, 'Tinos' ); ?>>Tinos</option>
						<option value="Titan One" <?php selected($font_family, 'Titan One' ); ?>>Titan One</option>
						<option value="Trade Winds" <?php selected($font_family, 'Trade Winds' ); ?> >Trade Winds</option>
						<option value="Titillium Web" <?php selected($font_family, 'Titillium Web' ); ?>>Titillium Web</option>
						<option value="Trocchi" <?php selected($font_family, 'Trocchi' ); ?>>Trocchi</option>
						<option value="Trochut" <?php selected($font_family, 'Trochut' ); ?>>Trochut</option>
						<option value="Trykker" <?php selected($font_family, 'Trykker' ); ?>>Trykker</option>
						<option value="Tulpen One" <?php selected($font_family, 'Tulpen One' ); ?>>Tulpen One</option>
						<option value="Ubuntu" <?php selected($font_family, 'Ubuntu' ); ?>>Ubuntu</option>
						<option value="Ubuntu Condensed" <?php selected($font_family, 'Ubuntu Condensed' ); ?>>Ubuntu Condensed</option>
						<option value="Ubuntu Mono" <?php selected($font_family, 'Ubuntu Mono' ); ?>>Ubuntu Mono</option>
						<option value="Ultra" <?php selected($font_family, 'Ultra' ); ?>>Ultra</option>
						<option value="Uncial Antiqua" <?php selected($font_family, 'Uncial Antiqua' ); ?>>Uncial Antiqua</option>
						<option value="UnifrakturCook" <?php selected($font_family, 'UnifrakturCook' ); ?>>UnifrakturCook</option>
						<option value="UnifrakturMaguntia" <?php selected($font_family, 'UnifrakturMaguntia' ); ?>>UnifrakturMaguntia</option>
						<option value="Unkempt" <?php selected($font_family, 'Unkempt' ); ?>>Unkempt</option>
						<option value="Unlock" <?php selected($font_family, 'Unlock' ); ?>>Unlock</option>
						<option value="Unna" <?php selected($font_family, 'Unna' ); ?>>Unna</option>
						<option value="VT323" <?php selected($font_family, 'VT323' ); ?>>VT323</option>
						<option value="Varela" <?php selected($font_family, 'Varela' ); ?>>Varela</option>
						<option value="Varela Round" <?php selected($font_family, 'Varela Round' ); ?>>Varela Round</option>
						<option value="Vast Shadow" <?php selected($font_family, 'Vast Shadow' ); ?>>Vast Shadow</option>
						<option value="Vibur" <?php selected($font_family, 'Vibur' ); ?>>Vibur</option>
						<option value="Vidaloka" <?php selected($font_family, 'Vidaloka' ); ?>>Vidaloka</option>
						<option value="Viga" <?php selected($font_family, 'Viga' ); ?>>Viga</option>
						<option value="Voces" <?php selected($font_family, 'Voces' ); ?>>Voces</option>
						<option value="Volkhov" <?php selected($font_family, 'Volkhov' ); ?>>Volkhov</option>
						<option value="Vollkorn" <?php selected($font_family, 'Vollkorn' ); ?>>Vollkorn</option>
						<option value="Voltaire" <?php selected($font_family, 'Voltaire' ); ?>>Voltaire</option>
						<option value="Waiting for the Sunrise" <?php selected($font_family, 'Waiting for the Sunrise' ); ?>>Waiting for the Sunrise</option>
						<option value="Wallpoet" <?php selected($font_family, 'Wallpoet' ); ?>>Wallpoet</option>
						<option value="Walter Turncoat" <?php selected($font_family, 'Walter Turncoat' ); ?>>Walter Turncoat</option>
						<option value="Wellfleet" <?php selected($font_family, 'Wellfleet' ); ?>>Wellfleet</option>
						<option value="Wire One" <?php selected($font_family, 'Wire One' ); ?>>Wire One</option>
						<option value="Yanone Kaffeesatz" <?php selected($font_family, 'Yanone Kaffeesatz' ); ?>>Yanone Kaffeesatz</option>
						<option value="Yellowtail" <?php selected($font_family, 'Yellowtail' ); ?>>Yellowtail</option>
						<option value="Yeseva One" <?php selected($font_family, 'Yeseva One' ); ?>>Yeseva One</option>
						<option value="Yesteryear" <?php selected($font_family, 'Yesteryear' ); ?>>Yesteryear</option>
						<option value="Zeyada" <?php selected($font_family, 'Zeyada' ); ?>>Zeyada</option>
					</optgroup>
				</select>