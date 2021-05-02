/*
-- Query: SELECT * FROM cours.web_docs
LIMIT 0, 200

-- Date: 2020-04-29 16:36
*/
INSERT INTO `web_docs` (`id`,`ar_name`,`article`) VALUES (12,'Подключение CSS Стилей - 3 Варианта','<p>\r\n	<strong>Вариант 1 &mdash; Глобальный CSS</strong></p>\r\n<p>\r\n	Глобальный CSS помещается в контейнер <em>head</em> конкретной страницы. При таком варианте подключения классы и идентификаторы (ID) могут быть использованы для обращения к CSS коду, однако, они будут активны только на этой конкретной странице. CSS стили подключенные таким путем загружаются при каждой повторной загрузке страницы, поэтому они могут повлиять на скорость ее загрузки. Тем не менее, существует несколько ситуаций в которых использование глобальных CSS может быть полезно. К примеру, если вам необходимо отправить кому-нибудь шаблон страницы &mdash; вам гораздо проще будет предоставить предварительный результат, если все будет на одной странице. Глобальные CSS помещаются между тегами <em>style</em>. Вот пример глобальной таблицы стилей:</p>\r\n<p>\r\n	<u>Преимущества глобальных CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Таблица стилей влияет только на одну страницу.</li>\r\n	<li>\r\n		В глобальной CSS могут быть использованы классы и идентификаторы (ID).</li>\r\n	<li>\r\n		Нет необходимости загружать несколько файлов. HTML и CSS могут быть в одном и том же файле.</li>\r\n</ul>\r\n<p>\r\n	<u>Недостатки глобальных CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Увеличенное время загрузки страницы.</li>\r\n	<li>\r\n		Подключается только к одной странице &mdash; неэффективно, если вы хотите использовать одну и ту же CSS для нескольких страниц.</li>\r\n</ul>\r\n<p>\r\n	<strong>Вариант 2 &mdash; Внешний CSS</strong></p>\r\n<p>\r\n	Возможно самый удобный вариант для подключения CSS к вашему сайту, это его привязка к внешнему .css файлу. В этом случае все изменения, сделанные во внешнем CSS файле, будут в целом отражаться на вашем сайте. Ссылка на внешний CSS файл помещается в контейнер head страницы:</p>\r\n<p>\r\n	<em>&nbsp; link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;style.css&quot; </em></p>\r\n<p>\r\n	Тогда как, сами таблицы стилей располагаются в файле style.css. К примеру:</p>\r\n<p>\r\n	<em>.xleftcol {</em></p>\r\n<p>\r\n	<em>&nbsp;&nbsp; float: left;</em></p>\r\n<p>\r\n	<em>&nbsp;&nbsp; width: 33%;</em></p>\r\n<p>\r\n	<em>&nbsp;&nbsp; background:#809900;</em></p>\r\n<p>\r\n	<em>}</em></p>\r\n<p>\r\n	<u>Преимущества внешних CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Меньший размер страницы HTML и более чистая структура файла.</li>\r\n	<li>\r\n		Быстрая скорость загрузки.</li>\r\n	<li>\r\n		Для разных страниц может быть использован один и тот же .css файл.</li>\r\n</ul>\r\n<p>\r\n	<u>Недостатки внешних CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Страница может некорректно отображаться до полной загрузки внешнего CSS.</li>\r\n</ul>\r\n<p>\r\n	<strong>Вариант 3 &mdash; Внутренний CSS</strong></p>\r\n<p>\r\n	Внутренний CSS используется для конкретного тега HTML. Атрибут <em>style</em> используется для настройки этого тега. Этот вариант подключения CSS не является рекомендованным, так как в этом случае необходимо настраивать каждый тег HTML по отдельности. К тому же управление вашим сайтом может стать довольно трудным, если вы будете использовать только внутренний CSS. Однако в некоторых случаях этот способ может быть весьма полезным. К примеру, в случае если у вас нет доступа к CSS файлам, или вам необходимо применить правила только для одного элемента.</p>\r\n<p>\r\n	<em>h1 style=&quot;color: white; padding: 30px;&quot;</em></p>\r\n<p>\r\n	<u>Преимущества</u> <u>внутреннего CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Полезен для проверки и предпросмотра изменений.</li>\r\n	<li>\r\n		Полезен для быстрых исправлений.</li>\r\n	<li>\r\n		Меньше HTTP запросов.</li>\r\n</ul>\r\n<p>\r\n	<u>Недостатки внутреннего CSS:</u></p>\r\n<ul>\r\n	<li>\r\n		Внутренние CSS должны быть применены для каждого элемента в отдельности.</li>\r\n</ul>\r\n<p>\r\n	<br />\r\n	&nbsp;</p>\r\n');
INSERT INTO `web_docs` (`id`,`ar_name`,`article`) VALUES (13,'Подключение JavaScript к HTML','<p>\r\n	Перед тем как использовать JavaScript, его необходимо добавить в HTML документ. Сделать это можно с помощью элемента <em><code>script</code></em> двумя способами:</p>\r\n<ol>\r\n	<li>\r\n		Определить встроенный сценарий, который располагается непосредственно между парой тегов <em><code>script</code></em> и <em><code>/script</code></em></li>\r\n	<li>\r\n		Подключить внешний файл с JavaScript-кодом</li>\r\n</ol>\r\n<p class=\"prim\">\r\n	<span class=\"dom\">Примечание:</span> элемент <em><code>script</code></em> может быть расположен в любом месте внутри элемента <em>head</em> и/или внутри элемента <em>body</em> и использоваться любое количество раз.</p>\r\n<h2 id=\"a1\">\r\n	Встроенный сценарий</h2>\r\n<p>\r\n	JavaScript код можно вставить непосредственно внутри элемента <em>script</em>. Сценарий, расположенный непосредственно внутри элемента, называется <span class=\"reftag\">встроенным</span>.</p>\r\n<h2 id=\"a2\">\r\n	Внешний сценарий</h2>\r\n<p>\r\n	В HTML документ можно также добавить JavaScript код, расположенный во внешнем файле с расширением .js. Сценарий, расположенный внутри внешнего файла, называется <span class=\"reftag\">внешним</span>. Подключение внешнего файла выполняется с помощью атрибута <em><code>src</code></em> тега <em><code>script. </code></em></p>\r\n<pre>\r\n<code>script src=&quot;ckeditor.js&quot;</code></pre>\r\n<p>\r\n	&nbsp;</p>\r\n');