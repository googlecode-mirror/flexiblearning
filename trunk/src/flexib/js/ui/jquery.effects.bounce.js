g.observable.Realm.runWithDefault(Realm.java:332)
	at org.eclipse.ui.internal.Workbench.createAndRunWorkbench(Workbench.java:663)
	at org.eclipse.ui.PlatformUI.createAndRunWorkbench(PlatformUI.java:149)
	at org.eclipse.ui.internal.ide.application.IDEApplication.start(IDEApplication.java:115)
	at org.eclipse.equinox.internal.app.EclipseAppHandle.run(EclipseAppHandle.java:196)
	at org.eclipse.core.runtime.internal.adaptor.EclipseAppLauncher.runApplication(EclipseAppLauncher.java:110)
	at org.eclipse.core.runtime.internal.adaptor.EclipseAppLauncher.start(EclipseAppLauncher.java:79)
	at org.eclipse.core.runtime.adaptor.EclipseStarter.run(EclipseStarter.java:369)
	at org.eclipse.core.runtime.adaptor.EclipseStarter.run(EclipseStarter.java:179)
	at sun.reflect.NativeMethodAccessorImpl.invoke0(Native Method)
	at sun.reflect.NativeMethodAccessorImpl.invoke(Unknown Source)
	at sun.reflect.DelegatingMethodAccessorImpl.invoke(Unknown Source)
	at java.lang.reflect.Method.invoke(Unknown Source)
	at org.eclipse.equinox.launcher.Main.invokeFramework(Main.java:619)
	at org.eclipse.equinox.launcher.Main.basicRun(Main.java:574)
	at org.eclipse.equinox.launcher.Main.run(Main.java:1407)
	at org.eclipse.equinox.launcher.Main.main(Main.java:1383)
!SUBENTRY 1 org.eclipse.core.resources 4 274 2011-08-26 00:49:21.406
!MESSAGE Resource is out of sync with the file system: '/flexib/application/models/videoCategory_model.php'.

!ENTRY org.eclipse.wst.sse.ui 4 4 2011-08-26 00:49:21.407
!MESSAGE Resource is out of sync with the file system: '/flexib/application/third_party/index.html'.
!STACK 1
org.eclipse.core.internal.resources.ResourceException: Resource is out of sync with the file system: '/flexib/application/third_party/index.html'.
	at org.eclipse.core.internal.resources.File.checkSynchronized(File.java:103)
	at org.eclipse.core.internal.resources.File.getContentDescription(File.java:273)
	at org.eclipse.wst.sse.ui.internal.actions.FormatActionDelegate.processorAvailable(FormatActionDelegate.java:219)
	at org.eclipse.wst.sse.ui.internal.actions.FormatActionDelegate.processorAvailable(FormatActionDelegate.java:232)
	at org.eclipse.wst.sse.ui.internal.actions.FormatActionDelegate.processorAvailable(FormatActionDelegate.java:232)
	at org.eclipse.wst.sse.ui.internal.actions.FormatActionDelegate.processorAvailable(FormatActionDelegate.java:232)
	at org.eclipse.php.internal.ui.actions.format.FormatActionDelegate.selectionChanged(FormatActionDelegate.java:141)
	at org.eclipse.php.internal.ui.actions.FormatDocumentAction.selectionChanged(FormatDocumentAction.java:33)
	at org.eclipse.ui.internal.PluginAction.refreshEnablement(PluginAction.java:206)
	at org.eclipse.ui.internal.PluginAction.selectionChanged(PluginAction.java:277)
	at org.eclipse.ui.internal.PluginAction.selectionChanged(PluginAction.java:299)
	at org.eclipse.ui.internal.AbstractSelectionService.fireSelection(AbstractSelectionService.java:156)
	at org.eclipse.ui.internal.AbstractSelectionService$1.selectionChanged(AbstractSelectionService.j