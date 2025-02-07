<?php

namespace MageMastery\Popup\Controller\Adminhtml\Popup;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use MageMastery\Popup\Model\ResourceModel\Popup\CollectionFactory;

class Export extends Action
{
    protected $popupCollectionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        CollectionFactory $popupCollectionFactory
    ) {
        parent::__construct($context);
        $this->popupCollectionFactory = $popupCollectionFactory;
    }

    public function execute()
    {
        // Get the collection of popups (with optional filters)
        $collection = $this->popupCollectionFactory->create();

        // Prepare CSV data for export
        $csvData = [];
        foreach ($collection as $popup) {
            // Add only the fields you need for the export
            $csvData[] = [
                'Popup ID' => $popup->getId(),
                'Name' => $popup->getName(),
                'Status' => $popup->getIsActive() ? 'Active' : 'Inactive',
                'Created At' => $popup->getCreatedAt(),
                'Updated At' => $popup->getUpdatedAt(),
            ];
        }

        // Output the CSV
        $fileName = 'popups_export.csv';
        $csv = $this->arrayToCsv($csvData);

        $response = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $response->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->setContents($csv);

        return $response;
    }

    /**
     * Convert an array to CSV format
     *
     * @param array $data
     * @return string
     */
    protected function arrayToCsv(array $data)
    {
        $csv = '';
        foreach ($data as $row) {
            $csv .= implode(',', $row) . "\n";
        }
        return $csv;
    }
}
