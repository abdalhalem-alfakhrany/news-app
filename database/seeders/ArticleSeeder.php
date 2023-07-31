<?php

namespace Database\Seeders;

use App\Models\Article\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $categoryWithImage = [
            ['food', '0f7IaLjLfKLhayFKymhnZTGOt9ypQ7SVD9vzdRPa.png'],
            ['midecal', '0f7IaLjLfKLhayFKymhnZTGOt9ypQ7SVD9vzdRPa.png'],
            ['polical', 'jmITdsxNX9g5I1p5CCZKxcEJgHUALK4u8GeXiX1F.png'],
            ['sports', 'MMo8zHKYSgZxyvQbuoNNrQvntTNoBTY1ijAYIEnO.png'],
            ['movies', 'UJYPYuTMgrkiSp6XFquwJpCljt9ekqhFOKYtHgXw.png']
        ];

        for ($i = 1; $i <= 100; $i++) {

            $category = rand(1, 5);

            $ad1 = rand(1, 10);

            $ad2 = rand(1, 10);
            while ($ad1 == $ad2) {
                $ad2 = rand(1, 10);
            }

            $ad3 = rand(1, 10);
            while ($ad3 == $ad1 || $ad3 == $ad2) {
                $ad3 = rand(1, 10);
            }

            Article::createWithTranslaions(

                $category,
                rand(1, 5),
                rand(1, 10),

                $categoryWithImage[$category - 1][1],
                'https://www.youtube.com/watch?v=RTTXZVIL6tw',

                //
                $ad1,
                $ad2,
                $ad3,

                //
                [
                    'title' => $categoryWithImage[$category - 1][0] . 'article ar',
                    'section1' => '
                    لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف',
                    'section2' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف',
                    'section3' => 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرفلوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف',
                ],
                [
                    'title' => $categoryWithImage[$category - 1][0] . 'article fr',
                    'section1' => "Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.",
                    'section2' => "Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.",
                    'section3' => "Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.Lorem Ipsum est simplement un texte formel (ce qui signifie que la fin est la forme, pas le contenu) et est utilisé dans les industries de l'impression et de l'édition. Lorem Ipsum est la norme pour le texte formel depuis le XVe siècle, lorsqu'une presse à imprimer inconnue a empilé un ensemble de lettres aléatoires tirées d'un texte, pour former une brochure comme guide ou référence formelle pour ces lettres.",
                ]
            );
        }
    }
}
