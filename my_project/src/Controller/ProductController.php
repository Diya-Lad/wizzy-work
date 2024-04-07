<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="app_product")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/createProduct", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response{

        // Creating product
        $entityManager = $this->getDoctrine()->getManager();

        $product = new product();
        $product->setName('Mouse');
        $product->setPrice(1000);
        $product->setDescription('New stylist');

        $entityManager->persist($product);

        $entityManager->flush();

        return new Response('Product is saved in the database. which has id: '.$product->getId());

        // Validating product
        // $product = new product();
        // $product->setName(null);
        // $product->setPrice('1000');

        // $errors = $validator->validate($product);
        // if(count($errors) > 0){
        //     return new Response((string) $errors, 400);
        // }

        // return new Response('Product details added correctly..');
    }

    // Fetching object from the database
    // /**
    //  * @Route("/showProduct/{id}", name="show_product")
    //  */
    // public function show(int $id) : Response {

    //     $product = $this->getDoctrine()->getRepository(Product::class)->find($id);

    //     if(!$product){
    //         throw $this->createNotFoundException(
    //             'No product found for id '.$id
    //         );
    //     }

    //     return new Response('Product '.$product->getName().' exists');
    // }

    // Fetching objects through repository
    /**
     * @Route("/showProduct/{id}", name="product_show")
     */
    public function show(int $id, ProductRepository $productRepository): Response
    {
        // $product = $productRepository
        //     ->find($id);
        $product = $productRepository->findOneBy(['name' => 'mouse']);
        // ...
        return new Response('Product '.$product->getName().' exists');
    }

    //Update object
    /**
     * @Route("/editProduct/edit/{id}", name="product_edit")
     */
    public function editProduct(int $id): Response{

        $entityManager = $this->getDoctrine()->getManager();

        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('Mouse12');

        $entityManager->flush();

        return new Response('Product updated successfully');
    }

    //Delete product
    /**
     * @Route("/deleteProduct/{id}", name="product_delete")
     */
    public function deleteProduct(int $id): Response{

        $entityManager = $this->getDoctrine()->getManager();

        $product = $entityManager->getRepository(Product::class)->find($id);

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('Product deleted successfully');
    }

    //get product from greater price
    /**
     * @Route("getProduct")
     */
    public function getProductGreaterPrice(): Response{
        $minPrice = 600;

        $entityManager = $this->getDoctrine()->getManager();
        $result = $entityManager->getRepository(Product::Class)->getProductsGreaterThanPrice($minPrice);

        return new Response('Total products: '.count($result));
    }

    //Example of saving the data in entity relationship
    /**
     * @Route("saveDataCate", name="product_save_data_category")
     */
    public function saveDataWithCategory(): Response {

        $entityManager = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setName('Computer Peripherals');

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish!');

        $product->setCategory($category);

        $entityManager->persist($category);
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response(
            'Saved new product with id: '.$product->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    /**
     * @Route("/showCate/{id}")
     */
    public function showProductCategory(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findOneByIdJoinedToCategory($id);

        $category = $product->getCategory();

        return new Response('Category: ');
    }

    /**
     * @Route("test")
     */
    public function test(): Response{

        $product = new Product();
        $product->setName('Monitor');
        $product->setPrice(30000);
        $product->setDescription('Ergonomic');

        $category = new Category();

        $result = $category->addProduct($product);

        print_r($result->getProducts());
        return new Response('done');
    }
}
