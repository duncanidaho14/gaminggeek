<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Image;
use App\Entity\Video;
use App\Entity\Categorie;
use App\Entity\Jeuxvideo;
use App\Entity\Plateforme;
use App\Entity\Commentaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('FR-fr');
        
        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');

        $manager->persist($adminRole);

        $adminUser = new User();
        $adminUser->setFirstName('elhadi')
                    ->setLastName('beddarem')
                    ->setEmail('elhadibeddarem@gmail.com')
                    ->setPassword($this->encoder->encodePassword($adminUser, 'password'))
                    ->setAvatar('https://www.nautiljon.com/images/perso/00/08/kirua_zoldyck_10080.jpg?1521322922')
                    ->setIntroduction($faker->sentence())
                    ->setDescription('<p>'.join('<p></p>', $faker->paragraphs(3)) . '<p>')
                    ->setAgreeTerms(1)
                    ->setIsVerified(1)
                    ->addUsersRole($adminRole);
        
        $manager->persist($adminUser);

        // Les utilisateurs

        $users = [];
        $genres = ['male', 'female'];

        for ($i=0; $i < 20; $i++) { 
            $user = new User();

            $genre = $faker->randomElement($genres);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99). '.jpg';

            $picture .= ($genre == 'male' ? 'men/' : 'women/') . $pictureId;

            $hash = $this->encoder->encodePassword($user, 'password');

            $user->setFirstName($faker->firstname($genre))
                ->setLastName($faker->lastname)
                ->setEmail($faker->email)
                ->setIntroduction($faker->sentence())
                ->setDescription('<p>'.join('<p></p>', $faker->paragraphs(3)) . '</p>')
                ->setPassword($hash)
                ->setAvatar($picture)
                ->setAgreeTerms(1)
                ->setIsVerified(1)
            ;

            $manager->persist($user);
            $users[] = $user;
        }

        // Les jeux vidéo
        for ($i=1; $i < 50; $i++) { 
            $jeuxvideo = new Jeuxvideo();

            $jeuxvideo->setName($faker->sentence())
                    ->setReleaseDate($faker->dateTimeBetween('-40 years', '+3 years'))
                    ->setPrice($faker->randomFloat(2))
                    ->setIntroduction($faker->sentence())
                    ->setDescription('<p>'.join('<p></p>', $faker->paragraphs(3)) . '</p>')
                    ->setUser($user)
            ;

            /**
             * les images
             */
            for ($img=0; $img < mt_rand(2, 5) ; $img++) { 
                $image = new Image();

                $image->setName($faker->sentence())
                    ->setUrl($faker->imageUrl())
                    ->setJeuxvideo($jeuxvideo)
                ;

                $manager->persist($image);
            }

            for ($vi=0; $vi < mt_rand(2, 4); $vi++) { 
                $video = new Video();

                $video->setName($faker->sentence())
                        ->setUrl("https://www.jeuxvideo.com/videos/iframe/2861393")
                        ->setJeuxvideo($jeuxvideo)
                        ->setUser($user)
                ;

                $manager->persist($video);
            }

            /**
             * Les commentaires
             */
            if (mt_rand(0, 1)) {
                $comment = new Commentaire();

                $comment->setComment($faker->paragraph())
                        ->setUser($user)
                        ->setJeuxvideo($jeuxvideo)
                ;

                $manager->persist($comment);
            }

            $manager->persist($jeuxvideo);
        }

        for ($c=0; $c < 8; $c++) { 
            $categorie = new Categorie();

            $categorie->setName($faker->sentence)
                    ->setPicture($faker->imageUrl())
                    ->addJeuxvideo($jeuxvideo);

            $manager->persist($categorie);
        }

        for ($p=0; $p < 12; $p++) { 
            $plateforme = new Plateforme();

            $plateforme->setName($faker->sentence())
                        ->setPicture($faker->imageUrl())
                        ->setUser($user)
                        ->AddJeuxvideo($jeuxvideo)
            ;

            $manager->persist($plateforme);
        }

        $manager->flush();
    }
}
