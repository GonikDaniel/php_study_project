1. Написать код, который будет использовать классы из файла classes.php следующим образом: 
создаст 3 экземплера класса NewsArticle и 3 экземпляра класса CrossArticle. После чего эти объекты будут
 добавлены в объект списка статей (экземпляр класса ArticleList) с помощью метода add().

2. Создать потомка класса Article, который будет отвечать за статьи, у которых есть прикреплённое 
изображение. Создать несколько таких статей и добавить в существующий список (экземпляр класса ArticleList).

3. Для всех типов статей добавить новый атрибут: $preview. В нём будет храниться короткое описание 
статьи, полученное из первых 15 символов содержимого статьи. Сделать так, чтобы при создании экземпляров статей 
этот атрибут заполнялся данными автоматически.

4. Создать потомок класса ArticleList, который будет выводить статьи в обратном порядке. А не в том, 
в котором статьи были добавлены.

5. В класс ArticleList добавить метод, который будет удалять из списка статью по её идентификатору (атрибут $id)

6. Заменить объявления всех атрибутов (var $id;) на объявления с указанием подходящего спецификатора 
доступа (public/protected/private)

<?php
require_once 'classes.php';

// Здесь разместить код, использующий классы из classes.php
$first_newaarticle = new NewsArticle (1, 'first_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, ea. Earum vitae incidunt dolor ullam quos qui nulla molestiae sed, error voluptatibus deserunt doloremque sunt amet esse assumenda, vel natus labore animi laborum quod aliquid. Quidem ratione repudiandae, praesentium vel expedita itaque, obcaecati quaerat modi labore quod odit amet tenetur.');
$second_newaarticle = new NewsArticle (2, 'second_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente quam deserunt iste eligendi voluptate quisquam quibusdam aliquid iusto corrupti ut officiis voluptatum numquam officia ullam quo sed minus culpa excepturi eos unde, sint rerum. Fuga est molestiae ipsam, qui sint id atque provident aperiam quibusdam rem hic iusto ullam at.');
$third_newaarticle = new NewsArticle (3, 'third_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et quidem necessitatibus qui consequuntur debitis assumenda aliquid soluta, fuga, nulla libero autem eos, veritatis aut doloremque nesciunt minus tempora consequatur. Recusandae iste ipsa dolore asperiores similique, nemo voluptas est, aut harum eligendi nam numquam? Earum, praesentium omnis itaque. Voluptates, ut molestiae.');

$first_crossarticle = new CrossArticle (4, 'first_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla praesentium, provident modi animi adipisci, unde aliquid assumenda ipsa pariatur eos expedita labore excepturi? Laboriosam velit omnis at, incidunt impedit culpa fugit alias ullam, aperiam, fuga nostrum? Modi animi reiciendis magni, cupiditate commodi sapiente enim recusandae nam nisi iste voluptas. Molestias.', 'first_source');
$second_crossarticle = new CrossArticle (5, 'second_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quo dicta nostrum eius incidunt quod hic architecto officiis obcaecati earum doloribus consectetur rerum asperiores in voluptates repellendus, enim vitae aliquid voluptatem itaque ipsum temporibus. Odio velit provident, officiis alias illum incidunt esse et voluptas ducimus sit voluptatum, eos quos consectetur!', 'second_source');
$third_crossarticle = new CrossArticle (6, 'third_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, officiis deleniti veniam sapiente nulla accusantium harum, reiciendis! Soluta impedit distinctio magnam dicta alias id fuga labore at voluptas! Error natus nihil nostrum atque beatae accusamus nulla quidem modi deleniti ex perspiciatis fugiat voluptates, quo maiores, incidunt! Eveniet saepe doloremque, mollitia.', 'third_source');

$first_article_with_pic = new ArticleWithPic (1, 'first_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, repellat, officia. Possimus praesentium harum natus rerum aliquam labore magnam. Libero aperiam mollitia, fugit ipsam incidunt dolor at asperiores voluptate accusamus! Pariatur facere nobis blanditiis distinctio, magnam quaerat, neque cumque officiis vel voluptas eum, soluta possimus suscipit cupiditate animi accusantium. Non perferendis aliquam, nesciunt omnis ab labore autem temporibus ad similique ex consequuntur ut saepe, fuga voluptatum deserunt id aut numquam quisquam ipsum et doloribus quo error quis illum. Eos incidunt, iste eius, alias optio consequuntur unde fugiat? Dignissimos possimus reprehenderit nemo, magnam ab illo maiores voluptate praesentium ea adipisci obcaecati.', 'thumb_23.jpg');
$second_article_with_pic = new ArticleWithPic (1, 'second_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis consectetur debitis, officiis quidem quo, nemo laborum, est molestias temporibus et assumenda corporis fugit delectus non tenetur eos voluptates esse. Earum dolor numquam dolorum accusamus impedit, sint aliquam, facere ut amet harum nisi culpa modi obcaecati natus reiciendis quasi ipsam. Sequi voluptas deleniti facilis. Corporis quidem debitis labore, rem inventore hic, iste odit tempora quis necessitatibus possimus eligendi cum obcaecati quos cumque ab laudantium, laboriosam repellendus officia voluptatibus! Unde vitae error rerum nulla possimus enim ut. Accusantium, culpa. Aperiam quo neque est tenetur soluta natus labore, aspernatur, nihil aut. Corrupti, repudiandae.', 'thumb_4304_1.jpg');
$third_article_with_pic = new ArticleWithPic (1, 'third_title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat minus fugiat, architecto exercitationem id quibusdam reiciendis laudantium quidem sapiente nulla nobis possimus molestiae ducimus optio totam cumque quam quis aliquid eligendi sint ipsa corporis ullam eum harum. Blanditiis aspernatur, aliquam placeat eaque laudantium perferendis corporis numquam, pariatur nam, dignissimos veritatis veniam praesentium. Tempora laborum molestiae nesciunt consectetur nihil officiis distinctio est, temporibus alias doloremque facere amet odio omnis quaerat fugit blanditiis nostrum enim itaque nisi ullam, quas minus rem. Eius, aliquid non. Omnis rerum minima perspiciatis asperiores modi quidem harum dolorem, culpa impedit mollitia quos neque atque! Itaque, molestiae a?', 'thumb_батуты 5.jpg');

$new_article_list = new ArticleList();
$new_article_list->add($first_newaarticle);
$new_article_list->add($second_newaarticle);
$new_article_list->add($third_newaarticle);
$new_article_list->add($first_crossarticle);
$new_article_list->add($second_crossarticle);
$new_article_list->add($third_crossarticle);
$new_article_list->add($first_article_with_pic);
$new_article_list->add($second_article_with_pic);
$new_article_list->add($third_article_with_pic);
$new_article_list_reverse = new ArticleListReverse();
$new_article_list_reverse->add($new_article_list);


// $new_article_list->view();
// echo '<pre>';
// var_dump($new_article_list_reverse);
// echo '</pre>';
$new_article_list_reverse->view();


