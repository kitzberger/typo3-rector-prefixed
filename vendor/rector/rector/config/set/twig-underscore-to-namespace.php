<?php

declare (strict_types=1);
namespace Typo3RectorPrefix20210326;

use Rector\Renaming\Rector\FileWithoutNamespace\PseudoNamespaceToNamespaceRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\ValueObject\PseudoNamespaceToNamespace;
use Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
return static function (\Typo3RectorPrefix20210326\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Renaming\Rector\Name\RenameClassRector::class)->call('configure', [[\Rector\Renaming\Rector\Name\RenameClassRector::OLD_TO_NEW_CLASSES => ['Twig_LoaderInterface' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\LoaderInterface', 'Twig_Extension_StringLoader' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\StringLoaderExtension', 'Twig_Extension_Optimizer' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\OptimizerExtension', 'Twig_Extension_Debug' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\DebugExtension', 'Twig_Extension_Sandbox' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\SandboxExtension', 'Twig_Extension_Profiler' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\ProfilerExtension', 'Twig_Extension_Escaper' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\EscaperExtension', 'Twig_Extension_Staging' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\StagingExtension', 'Twig_Extension_Core' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\CoreExtension', 'Twig_Node' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Node', 'Twig_NodeVisitor_Optimizer' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\OptimizerNodeVisitor', 'Twig_NodeVisitor_SafeAnalysis' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\SafeAnalysisNodeVisitor', 'Twig_NodeVisitor_Sandbox' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\SandboxNodeVisitor', 'Twig_NodeVisitor_Escaper' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\EscaperNodeVisitor', 'Twig_SimpleFunction' => 'Typo3RectorPrefix20210326\\Twig\\TwigFunction', 'Twig_Function' => 'Typo3RectorPrefix20210326\\Twig\\TwigFunction', 'Twig_Error_Syntax' => 'Typo3RectorPrefix20210326\\Twig\\Error\\SyntaxError', 'Twig_Error_Loader' => 'Typo3RectorPrefix20210326\\Twig\\Error\\LoaderError', 'Twig_Error_Runtime' => 'Typo3RectorPrefix20210326\\Twig\\Error\\RuntimeError', 'Twig_TokenParser' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\AbstractTokenParser', 'Twig_TokenParserInterface' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\TokenParserInterface', 'Twig_CacheInterface' => 'Typo3RectorPrefix20210326\\Twig\\Cache\\CacheInterface', 'Twig_NodeVisitorInterface' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\NodeVisitorInterface', 'Twig_Profiler_NodeVisitor_Profiler' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\NodeVisitor\\ProfilerNodeVisitor', 'Twig_Profiler_Dumper_Text' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Dumper\\TextDumper', 'Twig_Profiler_Dumper_Base' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Dumper\\BaseDumper', 'Twig_Profiler_Dumper_Blackfire' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Dumper\\BlackfireDumper', 'Twig_Profiler_Dumper_Html' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Dumper\\HtmlDumper', 'Twig_Profiler_Node_LeaveProfile' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Node\\LeaveProfileNode', 'Twig_Profiler_Node_EnterProfile' => 'Typo3RectorPrefix20210326\\Twig\\Profiler\\Node\\EnterProfileNode', 'Twig_Error' => 'Typo3RectorPrefix20210326\\Twig\\Error\\Error', 'Twig_ExistsLoaderInterface' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\ExistsLoaderInterface', 'Twig_SimpleTest' => 'Typo3RectorPrefix20210326\\Twig\\TwigTest', 'Twig_Test' => 'Typo3RectorPrefix20210326\\Twig\\TwigTest', 'Twig_FactoryRuntimeLoader' => 'Typo3RectorPrefix20210326\\Twig\\RuntimeLoader\\FactoryRuntimeLoader', 'Twig_NodeOutputInterface' => 'Typo3RectorPrefix20210326\\Twig\\Node\\NodeOutputInterface', 'Twig_SimpleFilter' => 'Typo3RectorPrefix20210326\\Twig\\TwigFilter', 'Twig_Filter' => 'Typo3RectorPrefix20210326\\Twig\\TwigFilter', 'Twig_Loader_Chain' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\ChainLoader', 'Twig_Loader_Array' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\ArrayLoader', 'Twig_Loader_Filesystem' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\FilesystemLoader', 'Twig_Cache_Null' => 'Typo3RectorPrefix20210326\\Twig\\Cache\\NullCache', 'Twig_Cache_Filesystem' => 'Typo3RectorPrefix20210326\\Twig\\Cache\\FilesystemCache', 'Twig_NodeCaptureInterface' => 'Typo3RectorPrefix20210326\\Twig\\Node\\NodeCaptureInterface', 'Twig_Extension' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\AbstractExtension', 'Twig_TokenParser_Macro' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\MacroTokenParser', 'Twig_TokenParser_Embed' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\EmbedTokenParser', 'Twig_TokenParser_Do' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\DoTokenParser', 'Twig_TokenParser_From' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\FromTokenParser', 'Twig_TokenParser_Extends' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\ExtendsTokenParser', 'Twig_TokenParser_Set' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\SetTokenParser', 'Twig_TokenParser_Sandbox' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\SandboxTokenParser', 'Twig_TokenParser_AutoEscape' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\AutoEscapeTokenParser', 'Twig_TokenParser_With' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\WithTokenParser', 'Twig_TokenParser_Include' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\IncludeTokenParser', 'Twig_TokenParser_Block' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\BlockTokenParser', 'Twig_TokenParser_Filter' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\FilterTokenParser', 'Twig_TokenParser_If' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\IfTokenParser', 'Twig_TokenParser_For' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\ForTokenParser', 'Twig_TokenParser_Flush' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\FlushTokenParser', 'Twig_TokenParser_Spaceless' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\SpacelessTokenParser', 'Twig_TokenParser_Use' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\UseTokenParser', 'Twig_TokenParser_Import' => 'Typo3RectorPrefix20210326\\Twig\\TokenParser\\ImportTokenParser', 'Twig_ContainerRuntimeLoader' => 'Typo3RectorPrefix20210326\\Twig\\RuntimeLoader\\ContainerRuntimeLoader', 'Twig_SourceContextLoaderInterface' => 'Typo3RectorPrefix20210326\\Twig\\Loader\\SourceContextLoaderInterface', 'Twig_NodeTraverser' => 'Typo3RectorPrefix20210326\\Twig\\NodeTraverser', 'Twig_ExtensionInterface' => 'Typo3RectorPrefix20210326\\Twig\\Extension\\ExtensionInterface', 'Twig_Node_Macro' => 'Typo3RectorPrefix20210326\\Twig\\Node\\MacroNode', 'Twig_Node_Embed' => 'Typo3RectorPrefix20210326\\Twig\\Node\\EmbedNode', 'Twig_Node_Do' => 'Typo3RectorPrefix20210326\\Twig\\Node\\DoNode', 'Twig_Node_Text' => 'Typo3RectorPrefix20210326\\Twig\\Node\\TextNode', 'Twig_Node_Set' => 'Typo3RectorPrefix20210326\\Twig\\Node\\SetNode', 'Twig_Node_Sandbox' => 'Typo3RectorPrefix20210326\\Twig\\Node\\SandboxNode', 'Twig_Node_AutoEscape' => 'Typo3RectorPrefix20210326\\Twig\\Node\\AutoEscapeNode', 'Twig_Node_With' => 'Typo3RectorPrefix20210326\\Twig\\Node\\WithNode', 'Twig_Node_Include' => 'Typo3RectorPrefix20210326\\Twig\\Node\\IncludeNode', 'Twig_Node_Print' => 'Typo3RectorPrefix20210326\\Twig\\Node\\PrintNode', 'Twig_Node_Block' => 'Typo3RectorPrefix20210326\\Twig\\Node\\BlockNode', 'Twig_Node_Expression_MethodCall' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\MethodCallExpression', 'Twig_Node_Expression_Unary_Pos' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Unary\\PosUnary', 'Twig_Node_Expression_Unary_Not' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Unary\\NotUnary', 'Twig_Node_Expression_Unary_Neg' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Unary\\NegUnary', 'Twig_Node_Expression_GetAttr' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\GetAttrExpression', 'Twig_Node_Expression_Function' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\FunctionExpression', 'Twig_Node_Expression_Binary_Power' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\PowerBinary', 'Twig_Node_Expression_Binary_In' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\InBinary', 'Twig_Node_Expression_Binary_BitwiseXor' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\BitwiseXorBinary', 'Twig_Node_Expression_Binary_Concat' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\ConcatBinary', 'Twig_Node_Expression_Binary_NotEqual' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\NotEqualBinary', 'Twig_Node_Expression_Binary_Less' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\LessBinary', 'Twig_Node_Expression_Binary_And' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\AndBinary', 'Twig_Node_Expression_Binary_GreaterEqual' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\GreaterEqualBinary', 'Twig_Node_Expression_Binary_Mod' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\ModBinary', 'Twig_Node_Expression_Binary_NotIn' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\NotInBinary', 'Twig_Node_Expression_Binary_Add' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\AddBinary', 'Twig_Node_Expression_Binary_Matches' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\MatchesBinary', 'Twig_Node_Expression_Binary_EndsWith' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\EndsWithBinary', 'Twig_Node_Expression_Binary_FloorDiv' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\FloorDivBinary', 'Twig_Node_Expression_Binary_StartsWith' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\StartsWithBinary', 'Twig_Node_Expression_Binary_LessEqual' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\LessEqualBinary', 'Twig_Node_Expression_Binary_Equal' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\EqualBinary', 'Twig_Node_Expression_Binary_BitwiseAnd' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\BitwiseAndBinary', 'Twig_Node_Expression_Binary_Mul' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\MulBinary', 'Twig_Node_Expression_Binary_Range' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\RangeBinary', 'Twig_Node_Expression_Binary_Or' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\OrBinary', 'Twig_Node_Expression_Binary_Greater' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\GreaterBinary', 'Twig_Node_Expression_Binary_Div' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\DivBinary', 'Twig_Node_Expression_Binary_BitwiseOr' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\BitwiseOrBinary', 'Twig_Node_Expression_Binary_Sub' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\SubBinary', 'Twig_Node_Expression_Test_Even' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\EvenTest', 'Twig_Node_Expression_Test_Defined' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\DefinedTest', 'Twig_Node_Expression_Test_Sameas' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\SameasTest', 'Twig_Node_Expression_Test_Odd' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\OddTest', 'Twig_Node_Expression_Test_Constant' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\ConstantTest', 'Twig_Node_Expression_Test_Null' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\NullTest', 'Twig_Node_Expression_Test_Divisibleby' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Test\\DivisiblebyTest', 'Twig_Node_Expression_Array' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\ArrayExpression', 'Twig_Node_Expression_Binary' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Binary\\AbstractBinary', 'Twig_Node_Expression_Constant' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\ConstantExpression', 'Twig_Node_Expression_Parent' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\ParentExpression', 'Twig_Node_Expression_Test' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\TestExpression', 'Twig_Node_Expression_Filter_Default' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Filter\\DefaultFilter', 'Twig_Node_Expression_Filter' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\FilterExpression', 'Twig_Node_Expression_BlockReference' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\BlockReferenceExpression', 'Twig_Node_Expression_NullCoalesce' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\NullCoalesceExpression', 'Twig_Node_Expression_Name' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\NameExpression', 'Twig_Node_Expression_TempName' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\TempNameExpression', 'Twig_Node_Expression_Call' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\CallExpression', 'Twig_Node_Expression_Unary' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\Unary\\AbstractUnary', 'Twig_Node_Expression_AssignName' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\AssignNameExpression', 'Twig_Node_Expression_Conditional' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\ConditionalExpression', 'Twig_Node_CheckSecurity' => 'Typo3RectorPrefix20210326\\Twig\\Node\\CheckSecurityNode', 'Twig_Node_Expression' => 'Typo3RectorPrefix20210326\\Twig\\Node\\Expression\\AbstractExpression', 'Twig_Node_ForLoop' => 'Typo3RectorPrefix20210326\\Twig\\Node\\ForLoopNode', 'Twig_Node_If' => 'Typo3RectorPrefix20210326\\Twig\\Node\\IfNode', 'Twig_Node_For' => 'Typo3RectorPrefix20210326\\Twig\\Node\\ForNode', 'Twig_Node_BlockReference' => 'Typo3RectorPrefix20210326\\Twig\\Node\\BlockReferenceNode', 'Twig_Node_Flush' => 'Typo3RectorPrefix20210326\\Twig\\Node\\FlushNode', 'Twig_Node_Body' => 'Typo3RectorPrefix20210326\\Twig\\Node\\BodyNode', 'Twig_Node_Spaceless' => 'Typo3RectorPrefix20210326\\Twig\\Node\\SpacelessNode', 'Twig_Node_Import' => 'Typo3RectorPrefix20210326\\Twig\\Node\\ImportNode', 'Twig_Node_SandboxedPrint' => 'Typo3RectorPrefix20210326\\Twig\\Node\\SandboxedPrintNode', 'Twig_Node_Module' => 'Typo3RectorPrefix20210326\\Twig\\Node\\ModuleNode', 'Twig_RuntimeLoaderInterface' => 'Typo3RectorPrefix20210326\\Twig\\RuntimeLoader\\RuntimeLoaderInterface', 'Twig_BaseNodeVisitor' => 'Typo3RectorPrefix20210326\\Twig\\NodeVisitor\\AbstractNodeVisitor', 'Twig_Extensions_Extension_Text' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\TextExtension', 'Twig_Extensions_Extension_Array' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\ArrayExtension', 'Twig_Extensions_Extension_Date' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\DateExtension', 'Twig_Extensions_Extension_I18n' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\I18nExtension', 'Twig_Extensions_Extension_Intl' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\IntlExtension', 'Twig_Extensions_TokenParser_Trans' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\TokenParser\\TransTokenParser', 'Twig_Extensions_Node_Trans' => 'Typo3RectorPrefix20210326\\Twig\\Extensions\\Node\\TransNode']]]);
    $services->set(\Rector\Renaming\Rector\FileWithoutNamespace\PseudoNamespaceToNamespaceRector::class)->call('configure', [[\Rector\Renaming\Rector\FileWithoutNamespace\PseudoNamespaceToNamespaceRector::NAMESPACE_PREFIXES_WITH_EXCLUDED_CLASSES => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Renaming\ValueObject\PseudoNamespaceToNamespace('Twig_')])]]);
};
