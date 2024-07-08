<?php
namespace Ciandt\CustomAttribute\Console\Command;

use Magento\Framework\App\State;
use Magento\Framework\Console\Cli;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Area;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ciandt\CustomAttribute\Helper\Data as CustomAttributeHelper;

class UpdateCustomAttribute extends Command
{
    const INPUT_KEY_VALUE = 'value';

    protected $state;
    protected $productRepository;
    protected $searchCriteriaBuilder;
    protected $customAttributeHelper;

    public function __construct(
        State $state,
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CustomAttributeHelper $customAttributeHelper
    ) {
        $this->state = $state;
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->customAttributeHelper = $customAttributeHelper;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('custom:attribute:update')
            ->setDescription('Update Custom Attribute for all products')
            ->addArgument(self::INPUT_KEY_VALUE, InputArgument::REQUIRED, 'New value for custom attribute');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode(Area::AREA_GLOBAL);

        // Verificar si la funcionalidad del atributo está habilitada
        if (!$this->customAttributeHelper->isEnabled()) {
            $output->writeln('<info>Custom attribute functionality is disabled.</info>');
            return Cli::RETURN_SUCCESS;
        }

        $value = $input->getArgument(self::INPUT_KEY_VALUE);

        // Crear los criterios de búsqueda sin filtros para obtener todos los productos
        $searchCriteria = $this->searchCriteriaBuilder->create();

        // Obtener la lista de todos los productos
        $productCollection = $this->productRepository->getList($searchCriteria)->getItems();

        foreach ($productCollection as $product) {
            $product->setCustomAttribute('custom_product_attribute', $value);
            $this->productRepository->save($product);
        }

        $output->writeln('<info>Custom attribute updated successfully for all products.</info>');

        return Cli::RETURN_SUCCESS;
    }
}
