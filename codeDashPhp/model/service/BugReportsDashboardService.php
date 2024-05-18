<?php
require_once ROOT_PATH . "model/dto/BugReportDto.php";
require_once ROOT_PATH . "model/entity/BugReportEntity.php";

class BugReportsDashboardService{
    private $dbc;
    private $bugRepository;
    
    public function __construct($dbc){
        $this->dbc = $dbc;
        $this->bugRepository = new BugReportEntity($this->dbc);
    }

    public function deleteReport($id){
         $this->bugRepository->deleteData($id);
    }

    public function getBugReports(){
        $dtos = [];
        $bugEntities = $this->bugRepository->selectAllEntities("added", "DESC");
        foreach ($bugEntities as $entity) {
            $dto = new BugReportDto(
                $entity->getId(),
                $entity->getTitle(),
                $entity->getDescription(),
                $entity->getTime()
            );
            $dtos[] = $dto;
        }

        return $dtos;
        
    }
}
