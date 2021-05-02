/*
-- Query: SELECT * FROM cours.dsssl_xsl
LIMIT 0, 200

-- Date: 2020-04-29 16:33
*/
INSERT INTO `dsssl_xsl` (`id`,`ar_name`,`article`) VALUES (4,'eXtensible Stylesheet Language – язык форматирования XML данных','<p>\r\n	Принцип независимости определения внутренней структуры документа от способов представления этой информации состоит в отделении данных от процесса их обработки и отображения. Таким образом, полученные данные можно использовать в соответствии с нуждами клиента, то есть выбирать нужное оформление, применять необходимые методы обработки.</p>\r\n<p>\r\n	Управлять отображением элементов в окне программы-клиента (например, в окне браузера) можно с помощью специальных инструкций - стилевых таблиц XSL (eXstensible Stylesheet Language). Эти таблицы XSL позволяют определять оформление элемента в зависимости от его месторасположения внутри документа, то есть к двум элементам с одинаковым названием могут применяться различные правила форматирования. Кроме того, языком, лежащим в основе XSL, является XML, а это означает, что таблицы XSL более универсальны, а для контроля корректности составления таких стилевых таблиц можно использовать DTD-описания или схемы данных, рассмотренные ниже.</p>\r\n<p>\r\n	XSL-процессор комбинирует XML-документ со спецификацией XSL и создает результат, который для браузера будет HTML, но может быть и любого другого выходного типа &mdash; например RTD, необработанный текст и т.д.</p>\r\n<p>\r\n	XML рассматривается как преемник SGML, а этим подразумевается, что XSL тоже много черпает из некоторых спецификаций стилей SGM. Поскольку SGML стал международным стандартом взаимодействия документов, было бы разумно стили, определяющие то, какими должны быть документы, тоже стандартизировать. В результате мы имеем Язык Семантики и Спецификации Документов (Document Style Semantics and Specification Language &mdash; DSSSL). Однако, ранее коммерческих приложений с поддержкой DSSSL, не хватало.</p>\r\n<p>\r\n	Сейчас существует стандарт HTML, называемый Списки Каскадных Стилей (Cascading Style Sheets &mdash; CSS). Этот стандарт предусматривает расширенные возможности при переопределении умолчальных представлений HTML-тэгов, но этого иногда недостаточно, например, при переопределении тэгов и для наследования характеристик от главных или равноправных элементов. Этим и многим другим занимается XSL. Фактически, XSL можно рассматривать как комбинацию большинства возможностей DSSL (без увеличения усложненности) с совместимостью и легкостью в использовании CSS. Это &mdash; действительно лучшее, что можно было взять из того и другого.</p>\r\n<p>\r\n	XSL &mdash; это расширенное множество CSS, которое разрабатывается с возможностью автоматического преобразования из CSS, что сбережет инвестиции. XSL сможет изменить последовательность данных в документе без лишних обращений к серверу, что сбережет усилия при написании сценариев и отрицательно на быстродействие приложения в целом не повлияет. Другой важной возможностью XLS является способность определения функций форматирования для процессов как визуализации в реальном времени, так и печати. В данный момент CSS может поддерживать только характеристики визуализации в реальном времени.</p>\r\n<p>\r\n	Базовой доктриной XSL является то, что разработчик определяет правило для определенного элемента или набора элементов &mdash; правило, определяющее, как должен отображаться данный элемент.</p>\r\n');
INSERT INTO `dsssl_xsl` (`id`,`ar_name`,`article`) VALUES (6,'DSSSL. Определения','<p>\r\n	<b>DSSSL</b> (англ.&nbsp;<span lang=\"en\" style=\"font-style:italic;\">Document Style Semantics and Specification Language</span>&nbsp;&mdash; язык описания семантики и стиля документа)&nbsp;&mdash; язык для описания стилей SGML-документов, базирующийся на подмножестве языка программирования Scheme. DSSSL является предком CSS. Однако CSS применяется только для представления HTML и XML-документов, и при этом для преобразования структуры этих документов используется XSL. DSSSL же может использоваться в обеих целях.</p>\r\n<p>\r\n	Хотя DSSSL совместим с любыми SGML-форматами, используется он преимущественно с документами DocBook.</p>\r\n<p>\r\n	DSSSL - официальный стандарт ISO/IEC, определяющий язык управления способом форматирования SGML-документов для отображения их браузерами, программами печати и средствами различных других приложений. Спецификации этого языка были разработаны W3C и в дальнейшем были приняты ISO/IEC в качестве официального международного стандарта. Основу DSSSL составляет механизм таблиц стилей. Язык DSSSL послужил источником идей в разработке стандарта CSS1 для форматной разметки HTML- и XML-документов.<br />\r\n	Действующая версия языка DSSSL определяется принятым в 1996 г. официальным стандартом ISO/IEC 10179:1996.</p>\r\n');
INSERT INTO `dsssl_xsl` (`id`,`ar_name`,`article`) VALUES (7,'DSSSL Online in context','<p>\r\n	DSSSL (Document Style Semantics and Specification Language) is an International Standard, ISO/IEC 10179:1996, for specifying document transformation and formatting in a platform- and vendor-neutral manner. DSSSL can be used with any document format for which a property set can be defined according to the Property Set Definition Requirements of ISO/IEC 10744. In particular, it can be used to specify the presentation of documents marked up according to ISO 8879:1986, Standard Generalized Markup Language (SGML).</p>\r\n<p>\r\n	DSSSL consists of two main components: a transformation language and a style language. The transformation language is used to specify structural transformations on SGML source files. For example, a telephone directory structured as a series of entries ordered by last name could, by applying a transformation spec, be rendered as a series of entries sorted by first name instead. The transformation language can also be used to specify the merging of two or more documents, the generation of indexes and tables of contents, and other operations. While the transformation language is a powerful tool for gaining the maximum use from document databases, the focus in early DSSSL implementations will be on the style language component.</p>\r\n<p>\r\n	Within the style language, it is possible to identify a number of capabilities that for one reason or another should be considered optional for early implementations. Recognizing this, the designers of DSSSL designated certain features of the style language as optional and created a Core Query Language and a Core Expression Language specifically in order to make more limited implementations possible. However, they did not define any particular subset of the style language component within the standard itself, but rather left that task to industry organizations and standards bodies. This application profile is intended to be one such specification.</p>\r\n<p>\r\n	The current document grew out of discussions on the former DSSSL-Lite mailing list during the period from September through November 1995. These discussions culminated in a December 9, 1995 meeting of key SGML and DSSSL implementors in Boston hosted by Jon Bosak of Novell and chaired by the late Yuri Rubinsky of SoftQuad. The application profile resulting from that meeting was published on the Internet on December 12, 1995 as the document do951212.htm and announced at a workshop of the Fourth International World Wide Web Conference the same day.</p>\r\n<p>\r\n	In August 1996, the application profile was updated by Jon Bosak (now an employee of Sun Microsystems) to correct a number of discrepancies between the summary descriptions of flow object characteristics, which had been based on the September 1995 committee draft of the DSSSL specification, and the final DSSSL standard published in April 1996, and also to add certain optional features that are by consensus of the active DSSSL implementors now considered to be part of a minimal DSSSL implementation. These features include lambda, keywords, and let (including letrec, let*, and named let). This document is archived at sunsite.unc.edu in the directory /pub/sun-info/standards/dsssl/dssslo, from which it can be obtained by anonymous FTP.</p>\r\n');
