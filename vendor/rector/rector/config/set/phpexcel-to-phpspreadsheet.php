<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210302;

use Rector\PHPOffice\Rector\MethodCall\ChangeConditionalGetConditionRector;
use Rector\PHPOffice\Rector\MethodCall\ChangeConditionalReturnedCellRector;
use Rector\PHPOffice\Rector\MethodCall\ChangeConditionalSetConditionRector;
use Rector\PHPOffice\Rector\MethodCall\ChangeDuplicateStyleArrayToApplyFromArrayRector;
use Rector\PHPOffice\Rector\MethodCall\GetDefaultStyleToGetParentRector;
use Rector\PHPOffice\Rector\MethodCall\IncreaseColumnIndexRector;
use Rector\PHPOffice\Rector\MethodCall\RemoveSetTempDirOnExcelWriterRector;
use Rector\PHPOffice\Rector\StaticCall\AddRemovedDefaultValuesRector;
use Rector\PHPOffice\Rector\StaticCall\CellStaticToCoordinateRector;
use Rector\PHPOffice\Rector\StaticCall\ChangeChartRendererRector;
use Rector\PHPOffice\Rector\StaticCall\ChangeDataTypeForValueRector;
use Rector\PHPOffice\Rector\StaticCall\ChangeIOFactoryArgumentRector;
use Rector\PHPOffice\Rector\StaticCall\ChangePdfWriterRector;
use Rector\PHPOffice\Rector\StaticCall\ChangeSearchLocationToRegisterReaderRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
# see https://github.com/PHPOffice/PhpSpreadsheet/blob/master/docs/topics/migration-from-PHPExcel.md
# inspired https://github.com/PHPOffice/PhpSpreadsheet/blob/87f71e1930b497b36e3b9b1522117dfa87096d2b/src/PhpSpreadsheet/Helper/Migrator.php
return static function (\Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangeIOFactoryArgumentRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangeSearchLocationToRegisterReaderRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\CellStaticToCoordinateRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangeDataTypeForValueRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangePdfWriterRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\ChangeChartRendererRector::class);
    $services->set(\Rector\PHPOffice\Rector\StaticCall\AddRemovedDefaultValuesRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\ChangeConditionalReturnedCellRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\ChangeConditionalGetConditionRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\ChangeConditionalSetConditionRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\RemoveSetTempDirOnExcelWriterRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\ChangeDuplicateStyleArrayToApplyFromArrayRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\GetDefaultStyleToGetParentRector::class);
    $services->set(\Rector\PHPOffice\Rector\MethodCall\IncreaseColumnIndexRector::class);
    # beware! this can be run only once, since its circular change
    $services->set(\Rector\Renaming\Rector\MethodCall\RenameMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\MethodCall\RenameMethodRector::METHOD_CALL_RENAMES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([
        // https://github.com/PHPOffice/PhpSpreadsheet/blob/master/docs/topics/migration-from-PHPExcel.md#worksheetsetsharedstyle
        new \Rector\Renaming\ValueObject\MethodCallRename('PHPExcel_Worksheet', 'setSharedStyle', 'duplicateStyle'),
        // https://github.com/PHPOffice/PhpSpreadsheet/blob/master/docs/topics/migration-from-PHPExcel.md#worksheetgetselectedcell
        new \Rector\Renaming\ValueObject\MethodCallRename('PHPExcel_Worksheet', 'getSelectedCell', 'getSelectedCells'),
        // https://github.com/PHPOffice/PhpSpreadsheet/blob/master/docs/topics/migration-from-PHPExcel.md#cell-caching
        new \Rector\Renaming\ValueObject\MethodCallRename('PHPExcel_Worksheet', 'getCellCacheController', 'getCellCollection'),
        new \Rector\Renaming\ValueObject\MethodCallRename('PHPExcel_Worksheet', 'getCellCollection', 'getCoordinates'),
    ])]]);
    $configuration = [new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Shared_Date', 'ExcelToPHP', 'PHPExcel_Shared_Date', 'excelToTimestamp'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Shared_Date', 'ExcelToPHPObject', 'PHPExcel_Shared_Date', 'excelToDateTimeObject'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Shared_Date', 'FormattedPHPToExcel', 'PHPExcel_Shared_Date', 'formattedPHPToExcel'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Calculation_DateTime', 'DAYOFWEEK', 'PHPExcel_Calculation_DateTime', 'WEEKDAY'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Calculation_DateTime', 'WEEKOFYEAR', 'PHPExcel_Calculation_DateTime', 'WEEKNUCM'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Calculation_DateTime', 'SECONDOFMINUTE', 'PHPExcel_Calculation_DateTime', 'SECOND'), new \Rector\Renaming\ValueObject\RenameStaticMethod('PHPExcel_Calculation_DateTime', 'MINUTEOFHOUR', 'PHPExcel_Calculation_DateTime', 'MINUTE')];
    $services->set(\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::class)->call('configure', [[\Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector::OLD_TO_NEW_METHODS_BY_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline($configuration)]]);
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['PHPExcel' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Spreadsheet', 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE_Blip' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DggContainer\\BstoreContainer\\BSE\\Blip', 'PHPExcel_Shared_Escher_DgContainer_SpgrContainer_SpContainer' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DgContainer\\SpgrContainer\\SpContainer', 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer_BSE' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DggContainer\\BstoreContainer\\BSE', 'PHPExcel_Shared_Escher_DgContainer_SpgrContainer' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DgContainer\\SpgrContainer', 'PHPExcel_Shared_Escher_DggContainer_BstoreContainer' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DggContainer\\BstoreContainer', 'PHPExcel_Shared_OLE_PPS_File' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLE\\PPS\\File', 'PHPExcel_Shared_OLE_PPS_Root' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLE\\PPS\\Root', 'PHPExcel_Worksheet_AutoFilter_Column_Rule' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\AutoFilter\\Column\\Rule', 'PHPExcel_Writer_OpenDocument_Cell_Comment' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Cell\\Comment', 'PHPExcel_Calculation_Token_Stack' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Token\\Stack', 'PHPExcel_Chart_Renderer_jpgraph' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Renderer\\JpGraph', 'PHPExcel_Reader_Excel5_Escher' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xls\\Escher', 'PHPExcel_Reader_Excel5_MD5' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xls\\MD5', 'PHPExcel_Reader_Excel5_RC4' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xls\\RC4', 'PHPExcel_Reader_Excel2007_Chart' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xlsx\\Chart', 'PHPExcel_Reader_Excel2007_Theme' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xlsx\\Theme', 'PHPExcel_Shared_Escher_DgContainer' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DgContainer', 'PHPExcel_Shared_Escher_DggContainer' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher\\DggContainer', 'CholeskyDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\CholeskyDecomposition', 'EigenvalueDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\EigenvalueDecomposition', 'PHPExcel_Shared_JAMA_LUDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\LUDecomposition', 'PHPExcel_Shared_JAMA_Matrix' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\Matrix', 'QRDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\QRDecomposition', 'PHPExcel_Shared_JAMA_QRDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\QRDecomposition', 'SingularValueDecomposition' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\JAMA\\SingularValueDecomposition', 'PHPExcel_Shared_OLE_ChainedBlockStream' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLE\\ChainedBlockStream', 'PHPExcel_Shared_OLE_PPS' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLE\\PPS', 'PHPExcel_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\BestFit', 'PHPExcel_Exponential_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\ExponentialBestFit', 'PHPExcel_Linear_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\LinearBestFit', 'PHPExcel_Logarithmic_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\LogarithmicBestFit', 'polynomialBestFit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\PolynomialBestFit', 'PHPExcel_Polynomial_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\PolynomialBestFit', 'powerBestFit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\PowerBestFit', 'PHPExcel_Power_Best_Fit' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\PowerBestFit', 'trendClass' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Trend\\Trend', 'PHPExcel_Worksheet_AutoFilter_Column' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\AutoFilter\\Column', 'PHPExcel_Worksheet_Drawing_Shadow' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Drawing\\Shadow', 'PHPExcel_Writer_OpenDocument_Content' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Content', 'PHPExcel_Writer_OpenDocument_Meta' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Meta', 'PHPExcel_Writer_OpenDocument_MetaInf' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\MetaInf', 'PHPExcel_Writer_OpenDocument_Mimetype' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Mimetype', 'PHPExcel_Writer_OpenDocument_Settings' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Settings', 'PHPExcel_Writer_OpenDocument_Styles' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Styles', 'PHPExcel_Writer_OpenDocument_Thumbnails' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\Thumbnails', 'PHPExcel_Writer_OpenDocument_WriterPart' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods\\WriterPart', 'PHPExcel_Writer_PDF_Core' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Pdf', 'PHPExcel_Writer_PDF_DomPDF' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Pdf\\Dompdf', 'PHPExcel_Writer_PDF_mPDF' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Pdf\\Mpdf', 'PHPExcel_Writer_PDF_tcPDF' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Pdf\\Tcpdf', 'PHPExcel_Writer_Excel5_BIFFwriter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\BIFFwriter', 'PHPExcel_Writer_Excel5_Escher' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Escher', 'PHPExcel_Writer_Excel5_Font' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Font', 'PHPExcel_Writer_Excel5_Parser' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Parser', 'PHPExcel_Writer_Excel5_Workbook' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Workbook', 'PHPExcel_Writer_Excel5_Worksheet' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Worksheet', 'PHPExcel_Writer_Excel5_Xf' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls\\Xf', 'PHPExcel_Writer_Excel2007_Chart' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Chart', 'PHPExcel_Writer_Excel2007_Comments' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Comments', 'PHPExcel_Writer_Excel2007_ContentTypes' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\ContentTypes', 'PHPExcel_Writer_Excel2007_DocProps' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\DocProps', 'PHPExcel_Writer_Excel2007_Drawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Drawing', 'PHPExcel_Writer_Excel2007_Rels' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Rels', 'PHPExcel_Writer_Excel2007_RelsRibbon' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\RelsRibbon', 'PHPExcel_Writer_Excel2007_RelsVBA' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\RelsVBA', 'PHPExcel_Writer_Excel2007_StringTable' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\StringTable', 'PHPExcel_Writer_Excel2007_Style' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Style', 'PHPExcel_Writer_Excel2007_Theme' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Theme', 'PHPExcel_Writer_Excel2007_Workbook' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Workbook', 'PHPExcel_Writer_Excel2007_Worksheet' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\Worksheet', 'PHPExcel_Writer_Excel2007_WriterPart' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx\\WriterPart', 'PHPExcel_CachedObjectStorage_CacheBase' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Collection\\Cells', 'PHPExcel_CalcEngine_CyclicReferenceStack' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Engine\\CyclicReferenceStack', 'PHPExcel_CalcEngine_Logger' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Engine\\Logger', 'PHPExcel_Calculation_Functions' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Functions', 'PHPExcel_Calculation_Function' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Category', 'PHPExcel_Calculation_Database' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Database', 'PHPExcel_Calculation_DateTime' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\DateTime', 'PHPExcel_Calculation_Engineering' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Engineering', 'PHPExcel_Calculation_Exception' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Exception', 'PHPExcel_Calculation_ExceptionHandler' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\ExceptionHandler', 'PHPExcel_Calculation_Financial' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Financial', 'PHPExcel_Calculation_FormulaParser' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\FormulaParser', 'PHPExcel_Calculation_FormulaToken' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\FormulaToken', 'PHPExcel_Calculation_Logical' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Logical', 'PHPExcel_Calculation_LookupRef' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\LookupRef', 'PHPExcel_Calculation_MathTrig' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\MathTrig', 'PHPExcel_Calculation_Statistical' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Statistical', 'PHPExcel_Calculation_TextData' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\TextData', 'PHPExcel_Cell_AdvancedValueBinder' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\AdvancedValueBinder', 'PHPExcel_Cell_DataType' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\DataType', 'PHPExcel_Cell_DataValidation' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\DataValidation', 'PHPExcel_Cell_DefaultValueBinder' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\DefaultValueBinder', 'PHPExcel_Cell_Hyperlink' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\Hyperlink', 'PHPExcel_Cell_IValueBinder' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\IValueBinder', 'PHPExcel_Chart_Axis' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Axis', 'PHPExcel_Chart_DataSeries' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\DataSeries', 'PHPExcel_Chart_DataSeriesValues' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\DataSeriesValues', 'PHPExcel_Chart_Exception' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Exception', 'PHPExcel_Chart_GridLines' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\GridLines', 'PHPExcel_Chart_Layout' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Layout', 'PHPExcel_Chart_Legend' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Legend', 'PHPExcel_Chart_PlotArea' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\PlotArea', 'PHPExcel_Properties' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Properties', 'PHPExcel_Chart_Title' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Title', 'PHPExcel_DocumentProperties' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Document\\Properties', 'PHPExcel_DocumentSecurity' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Document\\Security', 'PHPExcel_Helper_HTML' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Helper\\Html', 'PHPExcel_Reader_Abstract' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\BaseReader', 'PHPExcel_Reader_CSV' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Csv', 'PHPExcel_Reader_DefaultReadFilter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\DefaultReadFilter', 'PHPExcel_Reader_Excel2003XML' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xml', 'PHPExcel_Reader_Exception' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Exception', 'PHPExcel_Reader_Gnumeric' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Gnumeric', 'PHPExcel_Reader_HTML' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Html', 'PHPExcel_Reader_IReadFilter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\IReadFilter', 'PHPExcel_Reader_IReader' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\IReader', 'PHPExcel_Reader_OOCalc' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Ods', 'PHPExcel_Reader_SYLK' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Slk', 'PHPExcel_Reader_Excel5' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xls', 'PHPExcel_Reader_Excel2007' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Reader\\Xlsx', 'PHPExcel_RichText_ITextElement' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\RichText\\ITextElement', 'PHPExcel_RichText_Run' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\RichText\\Run', 'PHPExcel_RichText_TextElement' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\RichText\\TextElement', 'PHPExcel_Shared_CodePage' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\CodePage', 'PHPExcel_Shared_Date' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Date', 'PHPExcel_Shared_Drawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Drawing', 'PHPExcel_Shared_Escher' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Escher', 'PHPExcel_Shared_File' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\File', 'PHPExcel_Shared_Font' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Font', 'PHPExcel_Shared_OLE' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLE', 'PHPExcel_Shared_OLERead' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\OLERead', 'PHPExcel_Shared_PasswordHasher' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\PasswordHasher', 'PHPExcel_Shared_String' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\StringHelper', 'PHPExcel_Shared_TimeZone' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\TimeZone', 'PHPExcel_Shared_XMLWriter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\XMLWriter', 'PHPExcel_Shared_Excel5' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Shared\\Xls', 'PHPExcel_Style_Alignment' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Alignment', 'PHPExcel_Style_Border' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Border', 'PHPExcel_Style_Borders' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Borders', 'PHPExcel_Style_Color' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Color', 'PHPExcel_Style_Conditional' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Conditional', 'PHPExcel_Style_Fill' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Fill', 'PHPExcel_Style_Font' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Font', 'PHPExcel_Style_NumberFormat' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\NumberFormat', 'PHPExcel_Style_Protection' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Protection', 'PHPExcel_Style_Supervisor' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Supervisor', 'PHPExcel_Worksheet_AutoFilter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\AutoFilter', 'PHPExcel_Worksheet_BaseDrawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\BaseDrawing', 'PHPExcel_Worksheet_CellIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\CellIterator', 'PHPExcel_Worksheet_Column' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Column', 'PHPExcel_Worksheet_ColumnCellIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\ColumnCellIterator', 'PHPExcel_Worksheet_ColumnDimension' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\ColumnDimension', 'PHPExcel_Worksheet_ColumnIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\ColumnIterator', 'PHPExcel_Worksheet_Drawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Drawing', 'PHPExcel_Worksheet_HeaderFooter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\HeaderFooter', 'PHPExcel_Worksheet_HeaderFooterDrawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\HeaderFooterDrawing', 'PHPExcel_WorksheetIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Iterator', 'PHPExcel_Worksheet_MemoryDrawing' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\MemoryDrawing', 'PHPExcel_Worksheet_PageMargins' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\PageMargins', 'PHPExcel_Worksheet_PageSetup' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\PageSetup', 'PHPExcel_Worksheet_Protection' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Protection', 'PHPExcel_Worksheet_Row' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Row', 'PHPExcel_Worksheet_RowCellIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\RowCellIterator', 'PHPExcel_Worksheet_RowDimension' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\RowDimension', 'PHPExcel_Worksheet_RowIterator' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\RowIterator', 'PHPExcel_Worksheet_SheetView' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\SheetView', 'PHPExcel_Writer_Abstract' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\BaseWriter', 'PHPExcel_Writer_CSV' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Csv', 'PHPExcel_Writer_Exception' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Exception', 'PHPExcel_Writer_HTML' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Html', 'PHPExcel_Writer_IWriter' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\IWriter', 'PHPExcel_Writer_OpenDocument' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Ods', 'PHPExcel_Writer_PDF' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Pdf', 'PHPExcel_Writer_Excel5' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xls', 'PHPExcel_Writer_Excel2007' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Writer\\Xlsx', 'PHPExcel_CachedObjectStorageFactory' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Collection\\CellsFactory', 'PHPExcel_Calculation' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Calculation\\Calculation', 'PHPExcel_Cell' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Cell\\Cell', 'PHPExcel_Chart' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Chart\\Chart', 'PHPExcel_Comment' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Comment', 'PHPExcel_Exception' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Exception', 'PHPExcel_HashTable' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\HashTable', 'PHPExcel_IComparable' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\IComparable', 'PHPExcel_IOFactory' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\IOFactory', 'PHPExcel_NamedRange' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\NamedRange', 'PHPExcel_ReferenceHelper' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\ReferenceHelper', 'PHPExcel_RichText' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\RichText\\RichText', 'PHPExcel_Settings' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Settings', 'PHPExcel_Style' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Style\\Style', 'PHPExcel_Worksheet' => 'Typo3RectorPrefix20210302\\PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet']]]);
};
