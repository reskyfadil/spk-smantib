<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="icon" href="assets/logo.png" type="image/x-icon">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/antd/dist/antd.min.css" /> -->
  <!-- <link href="assets/css/readable-bootstrap.min.css" rel="stylesheet" /> -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/antd/dist/antd.min.js"></script>
  <style>
    .ant-spin {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: absolute;
      display: none;
      color: #1890ff;
      text-align: center;
      vertical-align: middle;
      opacity: 0;
      transition: transform 0.3s cubic-bezier(0.78, 0.14, 0.15, 0.86);
    }
    .ant-spin-spinning {
      position: static;
      display: inline-block;
      opacity: 1;
    }
    .ant-spin-nested-loading {
      position: relative;
    }
    .ant-spin-nested-loading > div > .ant-spin {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 4;
      display: block;
      width: 100%;
      height: 100%;
      max-height: 400px;
    }
    .ant-spin-nested-loading > div > .ant-spin .ant-spin-dot {
      position: absolute;
      top: 50%;
      left: 50%;
      margin: -10px;
    }
    .ant-spin-nested-loading > div > .ant-spin .ant-spin-text {
      position: absolute;
      top: 50%;
      width: 100%;
      padding-top: 5px;
      text-shadow: 0 1px 2px #fff;
    }
    .ant-spin-nested-loading > div > .ant-spin.ant-spin-show-text .ant-spin-dot {
      margin-top: -20px;
    }
    .ant-spin-nested-loading > div > .ant-spin-sm .ant-spin-dot {
      margin: -7px;
    }
    .ant-spin-nested-loading > div > .ant-spin-sm .ant-spin-text {
      padding-top: 2px;
    }
    .ant-spin-nested-loading > div > .ant-spin-sm.ant-spin-show-text .ant-spin-dot {
      margin-top: -17px;
    }
    .ant-spin-nested-loading > div > .ant-spin-lg .ant-spin-dot {
      margin: -16px;
    }
    .ant-spin-nested-loading > div > .ant-spin-lg .ant-spin-text {
      padding-top: 11px;
    }
    .ant-spin-nested-loading > div > .ant-spin-lg.ant-spin-show-text .ant-spin-dot {
      margin-top: -26px;
    }
    .ant-spin-container {
      position: relative;
      transition: opacity 0.3s;
    }
    .ant-spin-container::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 10;
      display: none;
      width: 100%;
      height: 100%;
      background: #fff;
      opacity: 0;
      transition: all 0.3s;
      content: '';
      pointer-events: none;
    }
    .ant-spin-blur {
      clear: both;
      overflow: hidden;
      opacity: 0.5;
      user-select: none;
      pointer-events: none;
    }
    .ant-spin-blur::after {
      opacity: 0.4;
      pointer-events: auto;
    }
    .ant-spin-tip .ant-spin-tip {
      color: #737373;
      color: rgba(0, 0, 0, 0.45);
    }
    .ant-spin-dot {
      position: relative;
      display: inline-block;
      font-size: 20px;
      width: 1em;
      height: 1em;
    }
    .ant-spin-dot-item {
      position: absolute;
      display: block;
      width: 9px;
      height: 9px;
      background-color: #1890ff;
      border-radius: 100%;
      transform: scale(0.75);
      transform-origin: 50% 50%;
      opacity: 0.3;
      animation: antSpinMove 1s infinite linear alternate;
    }
    .ant-spin-dot-item:nth-child(1) {
      top: 0;
      left: 0;
    }
    .ant-spin-dot-item:nth-child(2) {
      top: 0;
      right: 0;
      animation-delay: 0.4s;
    }
    .ant-spin-dot-item:nth-child(3) {
      right: 0;
      bottom: 0;
      animation-delay: 0.8s;
    }
    .ant-spin-dot-item:nth-child(4) {
      bottom: 0;
      left: 0;
      animation-delay: 1.2s;
    }
    .ant-spin-dot-spin {
      transform: rotate(45deg);
      animation: antRotate 1.2s infinite linear;
    }
    .ant-spin-sm .ant-spin-dot {
      font-size: 14px;
    }
    .ant-spin-sm .ant-spin-dot i {
      width: 6px;
      height: 6px;
    }
    .ant-spin-lg .ant-spin-dot {
      font-size: 32px;
    }
    .ant-spin-lg .ant-spin-dot i {
      width: 14px;
      height: 14px;
    }
    .ant-spin.ant-spin-show-text .ant-spin-text {
      display: block;
    }
    @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
    /* IE10+ */
      .ant-spin-blur {
          background: #fff;
          opacity: 0.5;
    }
    }
    @keyframes antSpinMove {
      to {
          opacity: 1;
    }
    }
    @keyframes antRotate {
      to {
          transform: rotate(405deg);
    }
    }
    body {
      margin: 0;
      font-family: Roboto, Helvetica Neue,Helvetica,Arial,sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    code {
      font-family: source-code-pro, Menlo, Monaco, Consolas, "Courier New", monospace;
    }
    body, html {
      height: 100%;
      margin: 0;
      background: #E9EBEE;
    }
    .ant-layout {
      background: #E9EBEE;
    }
    .ant-layout-header {
      height: 40px;
      padding: 0px 30px;
      line-height: 64px;
      background: #D52525;
    }
    .ant-layout-sider {
      background: inherit;
    }
    .ant-card {
      border-radius: .5em;
    }
    .ant-card-body {
      padding: 0px;
      width: 342;
      height: 429.68;
    }
    .ant-collapse > .ant-collapse-item {
      border-bottom: 0px;
    }
    .ant-collapse-content {
      border-top: 0px;
    }
    .form-input-siaunhas .ant-form-item {
      margin: 10px;
    }
    .align-grid-self {
      align-self: center;
    }
    .content-siaunhas {
      padding-left: 1em;
      font-family: 'Roboto', sans-serif;
    }
    .content-siaunhas .body-content {
      padding: 26px;
      font-family: 'Roboto', sans-serif;
    }
    .body-content h2{
      font-weight: bold;
    }
    .myhr{
      border-top: 1px dashed #f0f0f0;
    }
    .modal-print {
      max-width: 70rem;
      width: 70rem;
      margin: auto;
    }
    .table-print-jadwal td, .table-print-jadwal th {
      font-size: 1em;
      border: 1px solid #929292;
      text-align: center;
      padding: .5em;
      color: black;
    }
    .table-print-jadwal th {
      background: #dfeaf6 
    }
    .table-print-jadwal {
      width: 100%;
    }
    .editable-cell-value-wrap {
      cursor: pointer;
    }
    .editable-cell-value-wrap:hover {
      border: 1px solid #d9d9d9;
      border-radius: 4px;
      padding: 4px 11px;
    }
    .bobot-nilai {
      box-sizing: border-box;
      font-variant: normal;
      list-style: none;
      position: relative;
      height: 40px;
      padding-left: 1em;
      color: rgba(0, 0, 0, 0.65);
      font-size: 12px;
      line-height: 1.5;
      background-color: #fff;
      background-image: none;
      transition: all 0.3s;
      display: inline-block;
      margin: 0;
      border: 1px solid #d9d9d9;
      border-radius: 4px;
    }
    .bobot-select .ant-select-disabled .ant-select-selection {
      background: white;
      color: black;
      border: none;
      font-weight: 700;
    }

    .ant-card {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: relative;
      background: #fff;
      border-radius: 2px;
      transition: all 0.3s;
    }
    .ant-card-hoverable {
      cursor: pointer;
    }
    .ant-card-hoverable:hover {
      border-color: rgba(0, 0, 0, 0.09);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.09);
    }
    .ant-card-bordered {
      border: 1px solid #e8e8e8;
    }
    .ant-card-head {
      min-height: 48px;
      margin-bottom: -1px;
      padding: 0px;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 500;
      font-size: 16px;
      background: transparent;
      border-bottom: 1px solid #e8e8e8;
      border-radius: 2px 2px 0 0;
      zoom: 1;
    }
    .ant-card-head::before,.ant-card-head::after {
      display: table;
      content: '';
    }
    .ant-card-head::after {
      clear: both;
    }
    .ant-card-head-wrapper {
      display: flex;
      align-items: center;
    }
    .ant-card-head-title {
      display: inline-block;
      flex: 1;
      padding: 0px;
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .ant-card-head .ant-tabs {
      clear: both;
      margin-bottom: -17px;
      color: rgba(0, 0, 0, 0.65);
      font-weight: normal;
      font-size: 14px;
    }
    .ant-card-head .ant-tabs-bar {
      border-bottom: 1px solid #e8e8e8;
    }
    .ant-card-extra {
      float: right;
      margin-left: auto;
      padding: 16px 0;
      color: rgba(0, 0, 0, 0.65);
      font-weight: normal;
      font-size: 14px;
    }
    .ant-card-body {
      padding: 0px;
      zoom: 1;
    }
    .ant-card-body::before,.ant-card-body::after {
      display: table;
      content: '';
    }
    .ant-card-body::after {
      clear: both;
    }
    .ant-card-contain-grid:not(.ant-card-loading) .ant-card-body {
      margin: -1px 0 0 -1px;
      padding: 0;
    }
    .ant-card-grid {
      float: left;
      width: 33.33%;
      padding: 24px;
      border: 0;
      border-radius: 0;
      box-shadow: 1px 0 0 0 #e8e8e8, 0 1px 0 0 #e8e8e8, 1px 1px 0 0 #e8e8e8, 1px 0 0 0 #e8e8e8 inset, 0 1px 0 0 #e8e8e8 inset;
      transition: all 0.3s;
    }
    .ant-card-grid-hoverable:hover {
      position: relative;
      z-index: 1;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
    .ant-card-contain-tabs > .ant-card-head .ant-card-head-title {
      min-height: 32px;
      padding-bottom: 0;
    }
    .ant-card-contain-tabs > .ant-card-head .ant-card-extra {
      padding-bottom: 0;
    }
    .ant-card-cover > * {
      display: block;
      width: 100%;
    }
    .ant-card-cover img {
      border-radius: 2px 2px 0 0;
    }
    .ant-card-actions {
      margin: 0;
      padding: 0;
      list-style: none;
      background: #fafafa;
      border-top: 1px solid #e8e8e8;
      zoom: 1;
    }
    .ant-card-actions::before,.ant-card-actions::after {
      display: table;
      content: '';
    }
    .ant-card-actions::after {
      clear: both;
    }
    .ant-card-actions > li {
      float: left;
      margin: 12px 0;
      color: rgba(0, 0, 0, 0.45);
      text-align: center;
    }
    .ant-card-actions > li > span {
      position: relative;
      display: block;
      min-width: 32px;
      font-size: 14px;
      line-height: 22px;
      cursor: pointer;
    }
    .ant-card-actions > li > span:hover {
      color: #1890ff;
      transition: color 0.3s;
    }
    .ant-card-actions > li > span a:not(.ant-btn),.ant-card-actions > li > span > .anticon {
      display: inline-block;
      width: 100%;
      color: rgba(0, 0, 0, 0.45);
      line-height: 22px;
      transition: color 0.3s;
    }
    .ant-card-actions > li > span a:not(.ant-btn):hover,.ant-card-actions > li > span > .anticon:hover {
      color: #1890ff;
    }
    .ant-card-actions > li > span > .anticon {
      font-size: 16px;
      line-height: 22px;
    }
    .ant-card-actions > li:not(:last-child) {
      border-right: 1px solid #e8e8e8;
    }
    .ant-card-type-inner .ant-card-head {
      padding: 0 24px;
      background: #fafafa;
    }
    .ant-card-type-inner .ant-card-head-title {
      padding: 12px 0;
      font-size: 14px;
    }
    .ant-card-type-inner .ant-card-body {
      padding: 16px 24px;
    }
    .ant-card-type-inner .ant-card-extra {
      padding: 13.5px 0;
    }
    .ant-card-meta {
      margin: -4px 0;
      zoom: 1;
    }
    .ant-card-meta::before,.ant-card-meta::after {
      display: table;
      content: '';
    }
    .ant-card-meta::after {
      clear: both;
    }
    .ant-card-meta-avatar {
      float: left;
      padding-right: 16px;
    }
    .ant-card-meta-detail {
      overflow: hidden;
    }
    .ant-card-meta-detail > div:not(:last-child) {
      margin-bottom: 8px;
    }
    .ant-card-meta-title {
      overflow: hidden;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 500;
      font-size: 16px;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .ant-card-meta-description {
      color: rgba(0, 0, 0, 0.45);
    }
    .ant-card-loading {
      overflow: hidden;
    }
    .ant-card-loading .ant-card-body {
      user-select: none;
    }
    .ant-card-loading-content p {
      margin: 0;
    }
    .ant-card-loading-block {
      height: 14px;
      margin: 4px 0;
      background: linear-gradient(90deg, rgba(207, 216, 220, 0.2), rgba(207, 216, 220, 0.4), rgba(207, 216, 220, 0.2));
      background-size: 600% 600%;
      border-radius: 2px;
      animation: card-loading 1.4s ease infinite;
    }
    @keyframes card-loading {
      0%, 100% {
          background-position: 0 50%;
    }
      50% {
          background-position: 100% 50%;
    }
    }
    .ant-card-small > .ant-card-head {
      min-height: 36px;
      padding: 0 12px;
      font-size: 14px;
    }
    .ant-card-small > .ant-card-head > .ant-card-head-wrapper > .ant-card-head-title {
      padding: 8px 0;
    }
    .ant-card-small > .ant-card-head > .ant-card-head-wrapper > .ant-card-extra {
      padding: 8px 0;
      font-size: 14px;
    }
    .ant-card-small > .ant-card-body {
      padding: 12px;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-nav-container {
      height: 40px;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-ink-bar {
      visibility: hidden;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab {
      height: 40px;
      margin: 0;
      margin-right: 2px;
      padding: 0 16px;
      line-height: 38px;
      background: #fafafa;
      border: 1px solid #e8e8e8;
      border-radius: 4px 4px 0 0;
      transition: all 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab-active {
      height: 40px;
      color: #1890ff;
      background: #fff;
      border-color: #e8e8e8;
      border-bottom: 1px solid #fff;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab-active::before {
      border-top: 2px solid transparent;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab-disabled {
      color: #1890ff;
      color: rgba(0, 0, 0, 0.25);
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab-inactive {
      padding: 0;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-nav-wrap {
      margin-bottom: 0;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab .ant-tabs-close-x {
      width: 16px;
      height: 16px;
      height: 14px;
      margin-right: -5px;
      margin-left: 3px;
      overflow: hidden;
      color: rgba(0, 0, 0, 0.45);
      font-size: 12px;
      vertical-align: middle;
      transition: all 0.3s;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab .ant-tabs-close-x:hover {
      color: rgba(0, 0, 0, 0.85);
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-content > .ant-tabs-tabpane,.ant-tabs.ant-tabs-editable-card .ant-tabs-card-content > .ant-tabs-tabpane {
      transition: none ;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-content > .ant-tabs-tabpane-inactive,.ant-tabs.ant-tabs-editable-card .ant-tabs-card-content > .ant-tabs-tabpane-inactive {
      overflow: hidden;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-card-bar .ant-tabs-tab:hover .anticon-close {
      opacity: 1;
    }
    .ant-tabs-extra-content {
      line-height: 45px;
    }
    .ant-tabs-extra-content .ant-tabs-new-tab {
      position: relative;
      width: 20px;
      height: 20px;
      color: rgba(0, 0, 0, 0.65);
      font-size: 12px;
      line-height: 20px;
      text-align: center;
      border: 1px solid #e8e8e8;
      border-radius: 2px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .ant-tabs-extra-content .ant-tabs-new-tab:hover {
      color: #1890ff;
      border-color: #1890ff;
    }
    .ant-tabs-extra-content .ant-tabs-new-tab svg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
    }
    .ant-tabs.ant-tabs-large .ant-tabs-extra-content {
      line-height: 56px;
    }
    .ant-tabs.ant-tabs-small .ant-tabs-extra-content {
      line-height: 37px;
    }
    .ant-tabs.ant-tabs-card .ant-tabs-extra-content {
      line-height: 40px;
    }
    .ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-nav-container,.ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-nav-container {
      height: 100%;
    }
    .ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-tab,.ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-tab {
      margin-bottom: 8px;
      border-bottom: 1px solid #e8e8e8;
    }
    .ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-tab-active,.ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-tab-active {
      padding-bottom: 4px;
    }
    .ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-tab:last-child,.ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-tab:last-child {
      margin-bottom: 8px;
    }
    .ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-new-tab,.ant-tabs-vertical.ant-tabs-card .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-new-tab {
      width: 90%;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-left .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-nav-wrap {
      margin-right: 0;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-left .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-tab {
      margin-right: 1px;
      border-right: 0;
      border-radius: 4px 0 0 4px;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-left .ant-tabs-card-bar.ant-tabs-left-bar .ant-tabs-tab-active {
      margin-right: -1px;
      padding-right: 18px;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-right .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-nav-wrap {
      margin-left: 0;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-right .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-tab {
      margin-left: 1px;
      border-left: 0;
      border-radius: 0 4px 4px 0;
    }
    .ant-tabs-vertical.ant-tabs-card.ant-tabs-right .ant-tabs-card-bar.ant-tabs-right-bar .ant-tabs-tab-active {
      margin-left: -1px;
      padding-left: 18px;
    }
    .ant-tabs .ant-tabs-card-bar.ant-tabs-bottom-bar .ant-tabs-tab {
      height: auto;
      border-top: 0;
      border-bottom: 1px solid #e8e8e8;
      border-radius: 0 0 4px 4px;
    }
    .ant-tabs .ant-tabs-card-bar.ant-tabs-bottom-bar .ant-tabs-tab-active {
      padding-top: 1px;
      padding-bottom: 0;
      color: #1890ff;
    }
    .ant-tabs {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: relative;
      overflow: hidden;
      zoom: 1;
    }
    .ant-tabs::before,.ant-tabs::after {
      display: table;
      content: '';
    }
    .ant-tabs::after {
      clear: both;
    }
    .ant-tabs-ink-bar {
      position: absolute;
      bottom: 1px;
      left: 0;
      z-index: 1;
      box-sizing: border-box;
      width: 0;
      height: 2px;
      background-color: #1890ff;
      transform-origin: 0 0;
    }
    .ant-tabs-bar {
      margin: 0 0 16px 0;
      border-bottom: 1px solid #e8e8e8;
      outline: none;
      transition: padding 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .ant-tabs-nav-container {
      position: relative;
      box-sizing: border-box;
      margin-bottom: -1px;
      overflow: hidden;
      font-size: 14px;
      line-height: 1.5;
      white-space: nowrap;
      transition: padding 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
      zoom: 1;
    }
    .ant-tabs-nav-container::before,.ant-tabs-nav-container::after {
      display: table;
      content: '';
    }
    .ant-tabs-nav-container::after {
      clear: both;
    }
    .ant-tabs-nav-container-scrolling {
      padding-right: 32px;
      padding-left: 32px;
    }
    .ant-tabs-bottom .ant-tabs-bottom-bar {
      margin-top: 16px;
      margin-bottom: 0;
      border-top: 1px solid #e8e8e8;
      border-bottom: none;
    }
    .ant-tabs-bottom .ant-tabs-bottom-bar .ant-tabs-ink-bar {
      top: 1px;
      bottom: auto;
    }
    .ant-tabs-bottom .ant-tabs-bottom-bar .ant-tabs-nav-container {
      margin-top: -1px;
      margin-bottom: 0;
    }
    .ant-tabs-tab-prev,.ant-tabs-tab-next {
      position: absolute;
      z-index: 2;
      width: 0;
      height: 100%;
      color: rgba(0, 0, 0, 0.45);
      text-align: center;
      background-color: transparent;
      border: 0;
      cursor: pointer;
      opacity: 0;
      transition: width 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), opacity 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), color 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
      user-select: none;
      pointer-events: none;
    }
    .ant-tabs-tab-prev.ant-tabs-tab-arrow-show,.ant-tabs-tab-next.ant-tabs-tab-arrow-show {
      width: 32px;
      height: 100%;
      opacity: 1;
      pointer-events: auto;
    }
    .ant-tabs-tab-prev:hover,.ant-tabs-tab-next:hover {
      color: rgba(0, 0, 0, 0.65);
    }
    .ant-tabs-tab-prev-icon,.ant-tabs-tab-next-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      font-weight: bold;
      font-style: normal;
      font-variant: normal;
      line-height: inherit;
      text-align: center;
      text-transform: none;
      transform: translate(-50%, -50%);
    }
    .ant-tabs-tab-prev-icon-target,.ant-tabs-tab-next-icon-target {
      display: block;
      display: inline-block;
      font-size: 12px;
      font-size: 10px;
      transform: scale(0.83333333) rotate(0deg);
    }
    :root .ant-tabs-tab-prev-icon-target,:root .ant-tabs-tab-next-icon-target {
      font-size: 12px;
    }
    .ant-tabs-tab-btn-disabled {
      cursor: not-allowed;
    }
    .ant-tabs-tab-btn-disabled,.ant-tabs-tab-btn-disabled:hover {
      color: rgba(0, 0, 0, 0.25);
    }
    .ant-tabs-tab-next {
      right: 2px;
    }
    .ant-tabs-tab-prev {
      left: 0;
    }
    :root .ant-tabs-tab-prev {
      filter: none;
    }
    .ant-tabs-nav-wrap {
      margin-bottom: -1px;
      overflow: hidden;
    }
    .ant-tabs-nav-scroll {
      overflow: hidden;
      white-space: nowrap;
    }
    .ant-tabs-nav {
      position: relative;
      display: inline-block;
      box-sizing: border-box;
      margin: 0;
      padding-left: 0;
      list-style: none;
      transition: transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .ant-tabs-nav::before,.ant-tabs-nav::after {
      display: table;
      content: ' ';
    }
    .ant-tabs-nav::after {
      clear: both;
    }
    .ant-tabs-nav .ant-tabs-tab {
      position: relative;
      display: inline-block;
      box-sizing: border-box;
      height: 100%;
      margin: 0 32px 0 0;
      padding: 12px 16px;
      text-decoration: none;
      cursor: pointer;
      transition: color 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .ant-tabs-nav .ant-tabs-tab::before {
      position: absolute;
      top: -1px;
      left: 0;
      width: 100%;
      border-top: 2px solid transparent;
      border-radius: 4px 4px 0 0;
      transition: all 0.3s;
      content: '';
      pointer-events: none;
    }
    .ant-tabs-nav .ant-tabs-tab:last-child {
      margin-right: 0;
    }
    .ant-tabs-nav .ant-tabs-tab:hover {
      color: #40a9ff;
    }
    .ant-tabs-nav .ant-tabs-tab:active {
      color: #096dd9;
    }
    .ant-tabs-nav .ant-tabs-tab .anticon {
      margin-right: 8px;
    }
    .ant-tabs-nav .ant-tabs-tab-active {
      color: #1890ff;
      font-weight: 500;
    }
    .ant-tabs-nav .ant-tabs-tab-disabled,.ant-tabs-nav .ant-tabs-tab-disabled:hover {
      color: rgba(0, 0, 0, 0.25);
      cursor: not-allowed;
    }
    .ant-tabs .ant-tabs-large-bar .ant-tabs-nav-container {
      font-size: 16px;
    }
    .ant-tabs .ant-tabs-large-bar .ant-tabs-tab {
      padding: 16px;
    }
    .ant-tabs .ant-tabs-small-bar .ant-tabs-nav-container {
      font-size: 14px;
    }
    .ant-tabs .ant-tabs-small-bar .ant-tabs-tab {
      padding: 8px 16px;
    }
    .ant-tabs-content::before {
      display: block;
      overflow: hidden;
      content: '';
    }
    .ant-tabs .ant-tabs-top-content,.ant-tabs .ant-tabs-bottom-content {
      width: 100%;
    }
    .ant-tabs .ant-tabs-top-content > .ant-tabs-tabpane,.ant-tabs .ant-tabs-bottom-content > .ant-tabs-tabpane {
      flex-shrink: 0;
      width: 100%;
      -webkit-backface-visibility: hidden;
      opacity: 1;
      transition: opacity 0.45s;
    }
    .ant-tabs .ant-tabs-top-content > .ant-tabs-tabpane-inactive,.ant-tabs .ant-tabs-bottom-content > .ant-tabs-tabpane-inactive {
      height: 0;
      padding: 0 ;
      overflow: hidden;
      opacity: 0;
      pointer-events: none;
    }
    .ant-tabs .ant-tabs-top-content > .ant-tabs-tabpane-inactive input,.ant-tabs .ant-tabs-bottom-content > .ant-tabs-tabpane-inactive input {
      visibility: hidden;
    }
    .ant-tabs .ant-tabs-top-content.ant-tabs-content-animated,.ant-tabs .ant-tabs-bottom-content.ant-tabs-content-animated {
      display: flex;
      flex-direction: row;
      transition: margin-left 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
      will-change: margin-left;
    }
    .ant-tabs .ant-tabs-left-bar,.ant-tabs .ant-tabs-right-bar {
      height: 100%;
      border-bottom: 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab-arrow-show,.ant-tabs .ant-tabs-right-bar .ant-tabs-tab-arrow-show {
      width: 100%;
      height: 32px;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab,.ant-tabs .ant-tabs-right-bar .ant-tabs-tab {
      display: block;
      float: none;
      margin: 0 0 16px 0;
      padding: 8px 24px;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab:last-child,.ant-tabs .ant-tabs-right-bar .ant-tabs-tab:last-child {
      margin-bottom: 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-extra-content,.ant-tabs .ant-tabs-right-bar .ant-tabs-extra-content {
      text-align: center;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-scroll,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-scroll {
      width: auto;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-container,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-container,.ant-tabs .ant-tabs-left-bar .ant-tabs-nav-wrap,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-wrap {
      height: 100%;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-container,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-container {
      margin-bottom: 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-container.ant-tabs-nav-container-scrolling,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-container.ant-tabs-nav-container-scrolling {
      padding: 32px 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-wrap,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav-wrap {
      margin-bottom: 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav,.ant-tabs .ant-tabs-right-bar .ant-tabs-nav {
      width: 100%;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-ink-bar,.ant-tabs .ant-tabs-right-bar .ant-tabs-ink-bar {
      top: 0;
      bottom: auto;
      left: auto;
      width: 2px;
      height: 0;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab-next,.ant-tabs .ant-tabs-right-bar .ant-tabs-tab-next {
      right: 0;
      bottom: 0;
      width: 100%;
      height: 32px;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab-prev,.ant-tabs .ant-tabs-right-bar .ant-tabs-tab-prev {
      top: 0;
      width: 100%;
      height: 32px;
    }
    .ant-tabs .ant-tabs-left-content,.ant-tabs .ant-tabs-right-content {
      width: auto;
      margin-top: 0 ;
      overflow: hidden;
    }
    .ant-tabs .ant-tabs-left-bar {
      float: left;
      margin-right: -1px;
      margin-bottom: 0;
      border-right: 1px solid #e8e8e8;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-tab {
      text-align: right;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-container {
      margin-right: -1px;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-nav-wrap {
      margin-right: -1px;
    }
    .ant-tabs .ant-tabs-left-bar .ant-tabs-ink-bar {
      right: 1px;
    }
    .ant-tabs .ant-tabs-left-content {
      padding-left: 24px;
      border-left: 1px solid #e8e8e8;
    }
    .ant-tabs .ant-tabs-right-bar {
      float: right;
      margin-bottom: 0;
      margin-left: -1px;
      border-left: 1px solid #e8e8e8;
    }
    .ant-tabs .ant-tabs-right-bar .ant-tabs-nav-container {
      margin-left: -1px;
    }
    .ant-tabs .ant-tabs-right-bar .ant-tabs-nav-wrap {
      margin-left: -1px;
    }
    .ant-tabs .ant-tabs-right-bar .ant-tabs-ink-bar {
      left: 1px;
    }
    .ant-tabs .ant-tabs-right-content {
      padding-right: 24px;
      border-right: 1px solid #e8e8e8;
    }
    .ant-tabs-top .ant-tabs-ink-bar-animated,.ant-tabs-bottom .ant-tabs-ink-bar-animated {
      transition: transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), width 0.2s cubic-bezier(0.645, 0.045, 0.355, 1), left 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .ant-tabs-left .ant-tabs-ink-bar-animated,.ant-tabs-right .ant-tabs-ink-bar-animated {
      transition: transform 0.3s cubic-bezier(0.645, 0.045, 0.355, 1), height 0.2s cubic-bezier(0.645, 0.045, 0.355, 1), top 0.3s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .no-flex > .ant-tabs-content > .ant-tabs-content-animated,.ant-tabs-no-animation > .ant-tabs-content > .ant-tabs-content-animated {
      margin-left: 0 ;
      transform: none ;
    }
    .no-flex > .ant-tabs-content > .ant-tabs-tabpane-inactive,.ant-tabs-no-animation > .ant-tabs-content > .ant-tabs-tabpane-inactive {
      height: 0;
      padding: 0 ;
      overflow: hidden;
      opacity: 0;
      pointer-events: none;
    }
    .no-flex > .ant-tabs-content > .ant-tabs-tabpane-inactive input,.ant-tabs-no-animation > .ant-tabs-content > .ant-tabs-tabpane-inactive input {
      visibility: hidden;
    }
    .ant-tabs-left-content > .ant-tabs-content-animated,.ant-tabs-right-content > .ant-tabs-content-animated {
      margin-left: 0 ;
      transform: none ;
    }
    .ant-tabs-left-content > .ant-tabs-tabpane-inactive,.ant-tabs-right-content > .ant-tabs-tabpane-inactive {
      height: 0;
      padding: 0 ;
      overflow: hidden;
      opacity: 0;
      pointer-events: none;
    }
    .ant-tabs-left-content > .ant-tabs-tabpane-inactive input,.ant-tabs-right-content > .ant-tabs-tabpane-inactive input {
      visibility: hidden;
    }
    .ant-form {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
    }
    .ant-form legend {
      display: block;
      width: 100%;
      margin-bottom: 20px;
      padding: 0;
      color: rgba(0, 0, 0, 0.45);
      font-size: 16px;
      line-height: inherit;
      border: 0;
      border-bottom: 1px solid #d9d9d9;
    }
    .ant-form label {
      font-size: 14px;
    }
    .ant-form input[type='search'] {
      box-sizing: border-box;
    }
    .ant-form input[type='radio'],.ant-form input[type='checkbox'] {
      line-height: normal;
    }
    .ant-form input[type='file'] {
      display: block;
    }
    .ant-form input[type='range'] {
      display: block;
      width: 100%;
    }
    .ant-form select[multiple],.ant-form select[size] {
      height: auto;
    }
    .ant-form input[type='file']:focus,.ant-form input[type='radio']:focus,.ant-form input[type='checkbox']:focus {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px;
    }
    .ant-form output {
      display: block;
      padding-top: 15px;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      line-height: 1.5;
    }
    .ant-form-item-required::before {
      display: inline-block;
      margin-right: 4px;
      color: #f5222d;
      font-size: 14px;
      font-family: SimSun, sans-serif;
      line-height: 1;
      content: '*';
    }
    .ant-form-hide-required-mark .ant-form-item-required::before {
      display: none;
    }
    .ant-form-item-label > label {
      color: rgba(0, 0, 0, 0.85);
    }
    .ant-form-item-label > label::after {
      content: ':';
      position: relative;
      top: -0.5px;
      margin: 0 8px 0 2px;
    }
    .ant-form-item-label > label.ant-form-item-no-colon::after {
      content: ' ';
    }
    .ant-form-item {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      margin-bottom: 24px;
      vertical-align: top;
    }
    .ant-form-item label {
      position: relative;
    }
    .ant-form-item label > .anticon {
      font-size: 14px;
      vertical-align: top;
    }
    .ant-form-item-control {
      position: relative;
      line-height: 40px;
      zoom: 1;
    }
    .ant-form-item-control::before,.ant-form-item-control::after {
      display: table;
      content: '';
    }
    .ant-form-item-control::after {
      clear: both;
    }
    .ant-form-item-children {
      position: relative;
    }
    .ant-form-item-with-help {
      margin-bottom: 5px;
    }
    .ant-form-item-label {
      display: inline-block;
      overflow: hidden;
      line-height: 39.9999px;
      white-space: nowrap;
      text-align: right;
      vertical-align: middle;
    }
    .ant-form-item-label-left {
      text-align: left;
    }
    .ant-form-item .ant-switch {
      margin: 2px 0 4px;
    }
    .ant-form-explain,.ant-form-extra {
      clear: both;
      min-height: 22px;
      margin-top: -2px;
      color: rgba(0, 0, 0, 0.45);
      font-size: 14px;
      line-height: 1.5;
      transition: color 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .ant-form-explain {
      margin-bottom: -1px;
    }
    .ant-form-extra {
      padding-top: 4px;
    }
    .ant-form-text {
      display: inline-block;
      padding-right: 8px;
    }
    .ant-form-split {
      display: block;
      text-align: center;
    }
    form .has-feedback .ant-input {
      padding-right: 30px;
    }
    form .has-feedback .ant-input-affix-wrapper .ant-input-suffix {
      padding-right: 18px;
    }
    form .has-feedback .ant-input-affix-wrapper .ant-input {
      padding-right: 49px;
    }
    form .has-feedback .ant-input-affix-wrapper.ant-input-affix-wrapper-input-with-clear-btn .ant-input {
      padding-right: 68px;
    }
    form .has-feedback > .ant-select .ant-select-arrow,form .has-feedback > .ant-select .ant-select-selection__clear,form .has-feedback :not(.ant-input-group-addon) > .ant-select .ant-select-arrow,form .has-feedback :not(.ant-input-group-addon) > .ant-select .ant-select-selection__clear {
      right: 28px;
    }
    form .has-feedback > .ant-select .ant-select-selection-selected-value,form .has-feedback :not(.ant-input-group-addon) > .ant-select .ant-select-selection-selected-value {
      padding-right: 42px;
    }
    form .has-feedback .ant-cascader-picker-arrow {
      margin-right: 17px;
    }
    form .has-feedback .ant-cascader-picker-clear {
      right: 28px;
    }
    form .has-feedback .ant-input-search:not(.ant-input-search-enter-button) .ant-input-suffix {
      right: 28px;
    }
    form .has-feedback .ant-calendar-picker-icon,form .has-feedback .ant-time-picker-icon,form .has-feedback .ant-calendar-picker-clear,form .has-feedback .ant-time-picker-clear {
      right: 28px;
    }
    form .ant-mentions,form textarea.ant-input {
      height: auto;
      margin-bottom: 4px;
    }
    form .ant-upload {
      background: transparent;
    }
    form input[type='radio'],form input[type='checkbox'] {
      width: 14px;
      height: 14px;
    }
    form .ant-radio-inline,form .ant-checkbox-inline {
      display: inline-block;
      margin-left: 8px;
      font-weight: normal;
      vertical-align: middle;
      cursor: pointer;
    }
    form .ant-radio-inline:first-child,form .ant-checkbox-inline:first-child {
      margin-left: 0;
    }
    form .ant-checkbox-vertical,form .ant-radio-vertical {
      display: block;
    }
    form .ant-checkbox-vertical + .ant-checkbox-vertical,form .ant-radio-vertical + .ant-radio-vertical {
      margin-left: 0;
    }
    form .ant-input-number + .ant-form-text {
      margin-left: 8px;
    }
    form .ant-input-number-handler-wrap {
      z-index: 2;
    }
    form .ant-select,form .ant-cascader-picker {
      width: 100%;
    }
    form .ant-input-group .ant-select,form .ant-input-group .ant-cascader-picker {
      width: auto;
    }
    form :not(.ant-input-group-wrapper) > .ant-input-group,form .ant-input-group-wrapper {
      display: inline-block;
      vertical-align: middle;
    }
    form:not(.ant-form-vertical) :not(.ant-input-group-wrapper) > .ant-input-group,form:not(.ant-form-vertical) .ant-input-group-wrapper {
      position: relative;
      top: -1px;
    }
    .ant-form-vertical .ant-form-item-label,.ant-col-24.ant-form-item-label,.ant-col-xl-24.ant-form-item-label {
      display: block;
      margin: 0;
      padding: 0 0 8px;
      line-height: 1.5;
      white-space: normal;
      text-align: left;
    }
    .ant-form-vertical .ant-form-item-label label::after,.ant-col-24.ant-form-item-label label::after,.ant-col-xl-24.ant-form-item-label label::after {
      display: none;
    }
    .ant-form-vertical .ant-form-item {
      padding-bottom: 8px;
    }
    .ant-form-vertical .ant-form-item-control {
      line-height: 1.5;
    }
    .ant-form-vertical .ant-form-explain {
      margin-top: 2px;
      margin-bottom: -5px;
    }
    .ant-form-vertical .ant-form-extra {
      margin-top: 2px;
      margin-bottom: -4px;
    }
    @media (max-width: 575px) {
      .ant-form-item-label, .ant-form-item-control-wrapper {
          display: block;
          width: 100%;
    }
      .ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-form-item-label label::after {
          display: none;
    }
      .ant-col-xs-24.ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-col-xs-24.ant-form-item-label label::after {
          display: none;
    }
    }
    @media (max-width: 767px) {
      .ant-col-sm-24.ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-col-sm-24.ant-form-item-label label::after {
          display: none;
    }
    }
    @media (max-width: 991px) {
      .ant-col-md-24.ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-col-md-24.ant-form-item-label label::after {
          display: none;
    }
    }
    @media (max-width: 1199px) {
      .ant-col-lg-24.ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-col-lg-24.ant-form-item-label label::after {
          display: none;
    }
    }
    @media (max-width: 1599px) {
      .ant-col-xl-24.ant-form-item-label {
          display: block;
          margin: 0;
          padding: 0 0 8px;
          line-height: 1.5;
          white-space: normal;
          text-align: left;
    }
      .ant-col-xl-24.ant-form-item-label label::after {
          display: none;
    }
    }
    .ant-form-inline .ant-form-item {
      display: inline-block;
      margin-right: 16px;
      margin-bottom: 0;
    }
    .ant-form-inline .ant-form-item-with-help {
      margin-bottom: 24px;
    }
    .ant-form-inline .ant-form-item > .ant-form-item-control-wrapper,.ant-form-inline .ant-form-item > .ant-form-item-label {
      display: inline-block;
      vertical-align: top;
    }
    .ant-form-inline .ant-form-text {
      display: inline-block;
    }
    .ant-form-inline .has-feedback {
      display: inline-block;
    }
    .has-success.has-feedback .ant-form-item-children-icon,.has-warning.has-feedback .ant-form-item-children-icon,.has-error.has-feedback .ant-form-item-children-icon,.is-validating.has-feedback .ant-form-item-children-icon {
      position: absolute;
      top: 50%;
      right: 0;
      z-index: 1;
      width: 32px;
      height: 20px;
      margin-top: -10px;
      font-size: 14px;
      line-height: 20px;
      text-align: center;
      visibility: visible;
      animation: zoomIn 0.3s cubic-bezier(0.12, 0.4, 0.29, 1.46);
      pointer-events: none;
    }
    .has-success.has-feedback .ant-form-item-children-icon svg,.has-warning.has-feedback .ant-form-item-children-icon svg,.has-error.has-feedback .ant-form-item-children-icon svg,.is-validating.has-feedback .ant-form-item-children-icon svg {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      margin: auto;
    }
    .has-success.has-feedback .ant-form-item-children-icon {
      color: #52c41a;
      animation-name: diffZoomIn1 ;
    }
    .has-warning .ant-form-explain,.has-warning .ant-form-split {
      color: #faad14;
    }
    .has-warning .ant-input,.has-warning .ant-input:hover {
      background-color: #fff;
      border-color: #faad14;
    }
    .has-warning .ant-input:focus {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-input:not([disabled]):hover {
      border-color: #faad14;
    }
    .has-warning .ant-calendar-picker-open .ant-calendar-picker-input {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-input-affix-wrapper .ant-input,.has-warning .ant-input-affix-wrapper .ant-input:hover {
      background-color: #fff;
      border-color: #faad14;
    }
    .has-warning .ant-input-affix-wrapper .ant-input:focus {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-input-affix-wrapper:hover .ant-input:not(.ant-input-disabled) {
      border-color: #faad14;
    }
    .has-warning .ant-input-prefix {
      color: #faad14;
    }
    .has-warning .ant-input-group-addon {
      color: #faad14;
      background-color: #fff;
      border-color: #faad14;
    }
    .has-warning .has-feedback {
      color: #faad14;
    }
    .has-warning.has-feedback .ant-form-item-children-icon {
      color: #faad14;
      animation-name: diffZoomIn3 ;
    }
    .has-warning .ant-select-selection {
      border-color: #faad14;
    }
    .has-warning .ant-select-selection:hover {
      border-color: #faad14;
    }
    .has-warning .ant-select-open .ant-select-selection,.has-warning .ant-select-focused .ant-select-selection {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-calendar-picker-icon::after,.has-warning .ant-time-picker-icon::after,.has-warning .ant-picker-icon::after,.has-warning .ant-select-arrow,.has-warning .ant-cascader-picker-arrow {
      color: #faad14;
    }
    .has-warning .ant-input-number,.has-warning .ant-time-picker-input {
      border-color: #faad14;
    }
    .has-warning .ant-input-number-focused,.has-warning .ant-time-picker-input-focused,.has-warning .ant-input-number:focus,.has-warning .ant-time-picker-input:focus {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-input-number:not([disabled]):hover,.has-warning .ant-time-picker-input:not([disabled]):hover {
      border-color: #faad14;
    }
    .has-warning .ant-cascader-picker:focus .ant-cascader-input {
      border-color: #ffc53d;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(250, 173, 20, 0.2);
    }
    .has-warning .ant-cascader-picker:hover .ant-cascader-input {
      border-color: #faad14;
    }
    .has-error .ant-form-explain,.has-error .ant-form-split {
      color: #f5222d;
    }
    .has-error .ant-input,.has-error .ant-input:hover {
      background-color: #fff;
      border-color: #f5222d;
    }
    .has-error .ant-input:focus {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-input:not([disabled]):hover {
      border-color: #f5222d;
    }
    .has-error .ant-calendar-picker-open .ant-calendar-picker-input {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-input-affix-wrapper .ant-input,.has-error .ant-input-affix-wrapper .ant-input:hover {
      background-color: #fff;
      border-color: #f5222d;
    }
    .has-error .ant-input-affix-wrapper .ant-input:focus {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-input-affix-wrapper:hover .ant-input:not(.ant-input-disabled) {
      border-color: #f5222d;
    }
    .has-error .ant-input-prefix {
      color: #f5222d;
    }
    .has-error .ant-input-group-addon {
      color: #f5222d;
      background-color: #fff;
      border-color: #f5222d;
    }
    .has-error .has-feedback {
      color: #f5222d;
    }
    .has-error.has-feedback .ant-form-item-children-icon {
      color: #f5222d;
      animation-name: diffZoomIn2 ;
    }
    .has-error .ant-select-selection {
      border-color: #f5222d;
    }
    .has-error .ant-select-selection:hover {
      border-color: #f5222d;
    }
    .has-error .ant-select-open .ant-select-selection,.has-error .ant-select-focused .ant-select-selection {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-select.ant-select-auto-complete .ant-input:focus {
      border-color: #f5222d;
    }
    .has-error .ant-input-group-addon .ant-select-selection {
      border-color: transparent;
      box-shadow: none;
    }
    .has-error .ant-calendar-picker-icon::after,.has-error .ant-time-picker-icon::after,.has-error .ant-picker-icon::after,.has-error .ant-select-arrow,.has-error .ant-cascader-picker-arrow {
      color: #f5222d;
    }
    .has-error .ant-input-number,.has-error .ant-time-picker-input {
      border-color: #f5222d;
    }
    .has-error .ant-input-number-focused,.has-error .ant-time-picker-input-focused,.has-error .ant-input-number:focus,.has-error .ant-time-picker-input:focus {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-input-number:not([disabled]):hover,.has-error .ant-time-picker-input:not([disabled]):hover {
      border-color: #f5222d;
    }
    .has-error .ant-mention-wrapper .ant-mention-editor,.has-error .ant-mention-wrapper .ant-mention-editor:not([disabled]):hover {
      border-color: #f5222d;
    }
    .has-error .ant-mention-wrapper.ant-mention-active:not([disabled]) .ant-mention-editor,.has-error .ant-mention-wrapper .ant-mention-editor:not([disabled]):focus {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-cascader-picker:focus .ant-cascader-input {
      border-color: #ff4d4f;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(245, 34, 45, 0.2);
    }
    .has-error .ant-cascader-picker:hover .ant-cascader-input {
      border-color: #f5222d;
    }
    .has-error .ant-transfer-list {
      border-color: #f5222d;
    }
    .has-error .ant-transfer-list-search:not([disabled]) {
      border-color: #d9d9d9;
    }
    .has-error .ant-transfer-list-search:not([disabled]):hover {
      border-color: #40a9ff;
      border-right-width: 1px ;
    }
    .has-error .ant-transfer-list-search:not([disabled]):focus {
      border-color: #40a9ff;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(24, 144, 255, 0.2);
    }
    .is-validating.has-feedback .ant-form-item-children-icon {
      display: inline-block;
      color: #1890ff;
    }
    .ant-advanced-search-form .ant-form-item {
      margin-bottom: 24px;
    }
    .ant-advanced-search-form .ant-form-item-with-help {
      margin-bottom: 5px;
    }
    .show-help-enter,.show-help-appear {
      animation-duration: 0.3s;
      animation-fill-mode: both;
      animation-play-state: paused;
    }
    .show-help-leave {
      animation-duration: 0.3s;
      animation-fill-mode: both;
      animation-play-state: paused;
    }
    .show-help-enter.show-help-enter-active,.show-help-appear.show-help-appear-active {
      animation-name: antShowHelpIn;
      animation-play-state: running;
    }
    .show-help-leave.show-help-leave-active {
      animation-name: antShowHelpOut;
      animation-play-state: running;
      pointer-events: none;
    }
    .show-help-enter,.show-help-appear {
      opacity: 0;
      animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    .show-help-leave {
      animation-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    @keyframes antShowHelpIn {
      0% {
          transform: translateY(-5px);
          opacity: 0;
    }
      100% {
          transform: translateY(0);
          opacity: 1;
    }
    }
    @keyframes antShowHelpOut {
      to {
          transform: translateY(-5px);
          opacity: 0;
    }
    }
    @keyframes diffZoomIn1 {
      0% {
          transform: scale(0);
    }
      100% {
          transform: scale(1);
    }
    }
    @keyframes diffZoomIn2 {
      0% {
          transform: scale(0);
    }
      100% {
          transform: scale(1);
    }
    }
    @keyframes diffZoomIn3 {
      0% {
          transform: scale(0);
    }
      100% {
          transform: scale(1);
    }
    }
    .ant-input {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-variant: normal;
      list-style: none;
      position: relative;
      display: inline-block;
      width: 100%;
      height: 32px;
      padding: 4px 11px;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      line-height: 1.5;
      background-color: #fff;
      background-image: none;
      border: 1px solid #d9d9d9;
      border-radius: 4px;
      transition: all 0.3s;
    }
    .ant-input::-moz-placeholder {
      color: #bfbfbf;
      opacity: 1;
    }
    .ant-input:-ms-input-placeholder {
      color: #bfbfbf;
    }
    .ant-input::-webkit-input-placeholder {
      color: #bfbfbf;
    }
    .ant-input:placeholder-shown {
      text-overflow: ellipsis;
    }
    .ant-input:hover {
      border-color: #40a9ff;
      border-right-width: 1px ;
    }
    .ant-input:focus {
      border-color: #40a9ff;
      border-right-width: 1px ;
      outline: 0;
      box-shadow: 0 0 0 2px rgba(24, 144, 255, 0.2);
    }
    .ant-input-disabled {
      color: rgba(0, 0, 0, 0.25);
      background-color: #f5f5f5;
      cursor: not-allowed;
      opacity: 1;
    }
    .ant-input-disabled:hover {
      border-color: #d9d9d9;
      border-right-width: 1px ;
    }
    .ant-input[disabled] {
      color: rgba(0, 0, 0, 0.25);
      background-color: #f5f5f5;
      cursor: not-allowed;
      opacity: 1;
    }
    .ant-input[disabled]:hover {
      border-color: #d9d9d9;
      border-right-width: 1px ;
    }
    textarea.ant-input {
      max-width: 100%;
      height: auto;
      min-height: 32px;
      line-height: 1.5;
      vertical-align: bottom;
      transition: all 0.3s, height 0s;
    }
    .ant-input-lg {
      height: 40px;
      padding: 6px 11px;
      font-size: 16px;
    }
    .ant-input-sm {
      height: 24px;
      padding: 1px 7px;
    }
    .ant-input-group {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: relative;
      display: table;
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
    }
    .ant-input-group[class*='col-'] {
      float: none;
      padding-right: 0;
      padding-left: 0;
    }
    .ant-input-group > [class*='col-'] {
      padding-right: 8px;
    }
    .ant-input-group > [class*='col-']:last-child {
      padding-right: 0;
    }
    .ant-input-group-addon,.ant-input-group-wrap,.ant-input-group > .ant-input {
      display: table-cell;
    }
    .ant-input-group-addon:not(:first-child):not(:last-child),.ant-input-group-wrap:not(:first-child):not(:last-child),.ant-input-group > .ant-input:not(:first-child):not(:last-child) {
      border-radius: 0;
    }
    .ant-input-group-addon,.ant-input-group-wrap {
      width: 1px;
      white-space: nowrap;
      vertical-align: middle;
    }
    .ant-input-group-wrap > * {
      display: block ;
    }
    .ant-input-group .ant-input {
      float: left;
      width: 100%;
      margin-bottom: 0;
      text-align: inherit;
    }
    .ant-input-group .ant-input:focus {
      z-index: 1;
      border-right-width: 1px;
    }
    .ant-input-group .ant-input:hover {
      z-index: 1;
      border-right-width: 1px;
    }
    .ant-input-group-addon {
      position: relative;
      padding: 0 11px;
      color: rgba(0, 0, 0, 0.65);
      font-weight: normal;
      font-size: 14px;
      text-align: center;
      background-color: #fafafa;
      border: 1px solid #d9d9d9;
      border-radius: 4px;
      transition: all 0.3s;
    }
    .ant-input-group-addon .ant-select {
      margin: -5px -11px;
    }
    .ant-input-group-addon .ant-select .ant-select-selection {
      margin: -1px;
      background-color: inherit;
      border: 1px solid transparent;
      box-shadow: none;
    }
    .ant-input-group-addon .ant-select-open .ant-select-selection,.ant-input-group-addon .ant-select-focused .ant-select-selection {
      color: #1890ff;
    }
    .ant-input-group-addon > i:only-child::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      content: '';
    }
    .ant-input-group > .ant-input:first-child,.ant-input-group-addon:first-child {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }
    .ant-input-group > .ant-input:first-child .ant-select .ant-select-selection,.ant-input-group-addon:first-child .ant-select .ant-select-selection {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }
    .ant-input-group > .ant-input-affix-wrapper:not(:first-child) .ant-input {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    .ant-input-group > .ant-input-affix-wrapper:not(:last-child) .ant-input {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }
    .ant-input-group-addon:first-child {
      border-right: 0;
    }
    .ant-input-group-addon:last-child {
      border-left: 0;
    }
    .ant-input-group > .ant-input:last-child,.ant-input-group-addon:last-child {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    .ant-input-group > .ant-input:last-child .ant-select .ant-select-selection,.ant-input-group-addon:last-child .ant-select .ant-select-selection {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    .ant-input-group-lg .ant-input,.ant-input-group-lg > .ant-input-group-addon {
      height: 40px;
      padding: 6px 11px;
      font-size: 16px;
    }
    .ant-input-group-sm .ant-input,.ant-input-group-sm > .ant-input-group-addon {
      height: 24px;
      padding: 1px 7px;
    }
    .ant-input-group-lg .ant-select-selection--single {
      height: 40px;
    }
    .ant-input-group-sm .ant-select-selection--single {
      height: 24px;
    }
    .ant-input-group .ant-input-affix-wrapper {
      display: table-cell;
      float: left;
      width: 100%;
    }
    .ant-input-group.ant-input-group-compact {
      display: block;
      zoom: 1;
    }
    .ant-input-group.ant-input-group-compact::before,.ant-input-group.ant-input-group-compact::after {
      display: table;
      content: '';
    }
    .ant-input-group.ant-input-group-compact::after {
      clear: both;
    }
    .ant-input-group.ant-input-group-compact-addon:not(:first-child):not(:last-child),.ant-input-group.ant-input-group-compact-wrap:not(:first-child):not(:last-child),.ant-input-group.ant-input-group-compact > .ant-input:not(:first-child):not(:last-child) {
      border-right-width: 1px;
    }
    .ant-input-group.ant-input-group-compact-addon:not(:first-child):not(:last-child):hover,.ant-input-group.ant-input-group-compact-wrap:not(:first-child):not(:last-child):hover,.ant-input-group.ant-input-group-compact > .ant-input:not(:first-child):not(:last-child):hover {
      z-index: 1;
    }
    .ant-input-group.ant-input-group-compact-addon:not(:first-child):not(:last-child):focus,.ant-input-group.ant-input-group-compact-wrap:not(:first-child):not(:last-child):focus,.ant-input-group.ant-input-group-compact > .ant-input:not(:first-child):not(:last-child):focus {
      z-index: 1;
    }
    .ant-input-group.ant-input-group-compact > * {
      display: inline-block;
      float: none;
      vertical-align: top;
      border-radius: 0;
    }
    .ant-input-group.ant-input-group-compact > *:not(:last-child) {
      margin-right: -1px;
      border-right-width: 1px;
    }
    .ant-input-group.ant-input-group-compact .ant-input {
      float: none;
    }
    .ant-input-group.ant-input-group-compact > .ant-select > .ant-select-selection,.ant-input-group.ant-input-group-compact > .ant-calendar-picker .ant-input,.ant-input-group.ant-input-group-compact > .ant-select-auto-complete .ant-input,.ant-input-group.ant-input-group-compact > .ant-cascader-picker .ant-input,.ant-input-group.ant-input-group-compact > .ant-mention-wrapper .ant-mention-editor,.ant-input-group.ant-input-group-compact > .ant-time-picker .ant-time-picker-input,.ant-input-group.ant-input-group-compact > .ant-input-group-wrapper .ant-input {
      border-right-width: 1px;
      border-radius: 0;
    }
    .ant-input-group.ant-input-group-compact > .ant-select > .ant-select-selection:hover,.ant-input-group.ant-input-group-compact > .ant-calendar-picker .ant-input:hover,.ant-input-group.ant-input-group-compact > .ant-select-auto-complete .ant-input:hover,.ant-input-group.ant-input-group-compact > .ant-cascader-picker .ant-input:hover,.ant-input-group.ant-input-group-compact > .ant-mention-wrapper .ant-mention-editor:hover,.ant-input-group.ant-input-group-compact > .ant-time-picker .ant-time-picker-input:hover,.ant-input-group.ant-input-group-compact > .ant-input-group-wrapper .ant-input:hover {
      z-index: 1;
    }
    .ant-input-group.ant-input-group-compact > .ant-select > .ant-select-selection:focus,.ant-input-group.ant-input-group-compact > .ant-calendar-picker .ant-input:focus,.ant-input-group.ant-input-group-compact > .ant-select-auto-complete .ant-input:focus,.ant-input-group.ant-input-group-compact > .ant-cascader-picker .ant-input:focus,.ant-input-group.ant-input-group-compact > .ant-mention-wrapper .ant-mention-editor:focus,.ant-input-group.ant-input-group-compact > .ant-time-picker .ant-time-picker-input:focus,.ant-input-group.ant-input-group-compact > .ant-input-group-wrapper .ant-input:focus {
      z-index: 1;
    }
    .ant-input-group.ant-input-group-compact > *:first-child,.ant-input-group.ant-input-group-compact > .ant-select:first-child > .ant-select-selection,.ant-input-group.ant-input-group-compact > .ant-calendar-picker:first-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-select-auto-complete:first-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-cascader-picker:first-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-mention-wrapper:first-child .ant-mention-editor,.ant-input-group.ant-input-group-compact > .ant-time-picker:first-child .ant-time-picker-input {
      border-top-left-radius: 4px;
      border-bottom-left-radius: 4px;
    }
    .ant-input-group.ant-input-group-compact > *:last-child,.ant-input-group.ant-input-group-compact > .ant-select:last-child > .ant-select-selection,.ant-input-group.ant-input-group-compact > .ant-calendar-picker:last-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-select-auto-complete:last-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-cascader-picker:last-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-cascader-picker-focused:last-child .ant-input,.ant-input-group.ant-input-group-compact > .ant-mention-wrapper:last-child .ant-mention-editor,.ant-input-group.ant-input-group-compact > .ant-time-picker:last-child .ant-time-picker-input {
      border-right-width: 1px;
      border-top-right-radius: 4px;
      border-bottom-right-radius: 4px;
    }
    .ant-input-group.ant-input-group-compact > .ant-select-auto-complete .ant-input {
      vertical-align: top;
    }
    .ant-input-group-wrapper {
      display: inline-block;
      width: 100%;
      text-align: start;
      vertical-align: top;
    }
    .ant-input-affix-wrapper {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: relative;
      display: inline-block;
      width: 100%;
      text-align: start;
    }
    .ant-input-affix-wrapper:hover .ant-input:not(.ant-input-disabled) {
      border-color: #40a9ff;
      border-right-width: 1px ;
    }
    .ant-input-affix-wrapper .ant-input {
      position: relative;
      text-align: inherit;
    }
    .ant-input-affix-wrapper .ant-input-prefix,.ant-input-affix-wrapper .ant-input-suffix {
      position: absolute;
      top: 50%;
      z-index: 2;
      display: flex;
      align-items: center;
      color: rgba(0, 0, 0, 0.65);
      line-height: 0;
      transform: translateY(-50%);
    }
    .ant-input-affix-wrapper .ant-input-prefix :not(.anticon),.ant-input-affix-wrapper .ant-input-suffix :not(.anticon) {
      line-height: 1.5;
    }
    .ant-input-affix-wrapper .ant-input-disabled ~ .ant-input-suffix .anticon {
      color: rgba(0, 0, 0, 0.25);
      cursor: not-allowed;
    }
    .ant-input-affix-wrapper .ant-input-prefix {
      left: 12px;
    }
    .ant-input-affix-wrapper .ant-input-suffix {
      right: 12px;
    }
    .ant-input-affix-wrapper .ant-input:not(:first-child) {
      padding-left: 30px;
    }
    .ant-input-affix-wrapper .ant-input:not(:last-child) {
      padding-right: 30px;
    }
    .ant-input-affix-wrapper.ant-input-affix-wrapper-input-with-clear-btn .ant-input:not(:last-child) {
      padding-right: 49px;
    }
    .ant-input-affix-wrapper.ant-input-affix-wrapper-textarea-with-clear-btn .ant-input {
      padding-right: 22px;
    }
    .ant-input-affix-wrapper .ant-input {
      min-height: 100%;
    }
    .ant-input-password-icon {
      color: rgba(0, 0, 0, 0.45);
      cursor: pointer;
      transition: all 0.3s;
    }
    .ant-input-password-icon:hover {
      color: #333;
    }
    .ant-input-clear-icon {
      color: rgba(0, 0, 0, 0.25);
      font-size: 12px;
      cursor: pointer;
      transition: color 0.3s;
      vertical-align: 0;
    }
    .ant-input-clear-icon:hover {
      color: rgba(0, 0, 0, 0.45);
    }
    .ant-input-clear-icon:active {
      color: rgba(0, 0, 0, 0.65);
    }
    .ant-input-clear-icon + i {
      margin-left: 6px;
    }
    .ant-input-textarea-clear-icon {
      color: rgba(0, 0, 0, 0.25);
      font-size: 12px;
      cursor: pointer;
      transition: color 0.3s;
      position: absolute;
      top: 0;
      right: 0;
      margin: 8px 8px 0 0;
    }
    .ant-input-textarea-clear-icon:hover {
      color: rgba(0, 0, 0, 0.45);
    }
    .ant-input-textarea-clear-icon:active {
      color: rgba(0, 0, 0, 0.65);
    }
    .ant-input-textarea-clear-icon + i {
      margin-left: 6px;
    }
    .ant-input-search-icon {
      color: rgba(0, 0, 0, 0.45);
      cursor: pointer;
      transition: all 0.3s;
    }
    .ant-input-search-icon:hover {
      color: rgba(0, 0, 0, 0.8);
    }
    .ant-input-search-enter-button input {
      border-right: 0;
    }
    .ant-input-search-enter-button + .ant-input-group-addon,.ant-input-search-enter-button input + .ant-input-group-addon {
      padding: 0;
      border: 0;
    }
    .ant-input-search-enter-button + .ant-input-group-addon .ant-input-search-button,.ant-input-search-enter-button input + .ant-input-group-addon .ant-input-search-button {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }
    .ant-message {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: fixed;
      top: 16px;
      left: 0;
      z-index: 1010;
      width: 100%;
      pointer-events: none;
    }
    .ant-message-notice {
      padding: 8px;
      text-align: center;
    }
    .ant-message-notice:first-child {
      margin-top: -8px;
    }
    .ant-message-notice-content {
      display: inline-block;
      padding: 10px 16px;
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      pointer-events: all;
    }
    .ant-message-success .anticon {
      color: #52c41a;
    }
    .ant-message-error .anticon {
      color: #f5222d;
    }
    .ant-message-warning .anticon {
      color: #faad14;
    }
    .ant-message-info .anticon,.ant-message-loading .anticon {
      color: #1890ff;
    }
    .ant-message .anticon {
      position: relative;
      top: 1px;
      margin-right: 8px;
      font-size: 16px;
    }
    .ant-message-notice.move-up-leave.move-up-leave-active {
      overflow: hidden;
      animation-name: MessageMoveOut;
      animation-duration: 0.3s;
    }
    @keyframes MessageMoveOut {
      0% {
          max-height: 150px;
          padding: 8px;
          opacity: 1;
    }
      100% {
          max-height: 0;
          padding: 0;
          opacity: 0;
    }
    }
    .ant-typography {
      color: rgba(0, 0, 0, 0.65);
    }
    .ant-typography.ant-typography-secondary {
      color: rgba(0, 0, 0, 0.45);
    }
    .ant-typography.ant-typography-warning {
      color: #faad14;
    }
    .ant-typography.ant-typography-danger {
      color: #f5222d;
    }
    .ant-typography.ant-typography-disabled {
      color: rgba(0, 0, 0, 0.25);
      cursor: not-allowed;
      user-select: none;
    }
    div.ant-typography,.ant-typography p {
      margin-bottom: 1em;
    }
    h1.ant-typography,.ant-typography h1 {
      margin-bottom: 0.5em;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 600;
      font-size: 38px;
      line-height: 1.23;
    }
    h2.ant-typography,.ant-typography h2 {
      margin-bottom: 0.5em;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 600;
      font-size: 30px;
      line-height: 1.35;
    }
    h3.ant-typography,.ant-typography h3 {
      margin-bottom: 0.5em;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 900;
      font-size: 24px;
      line-height: 1.35;
    }
    h4.ant-typography,.ant-typography h4 {
      margin-bottom: 0.5em;
      color: rgba(0, 0, 0, 0.85);
      font-weight: 600;
      font-size: 20px;
      line-height: 1.4;
    }
    .ant-typography + h1.ant-typography,.ant-typography + h2.ant-typography,.ant-typography + h3.ant-typography,.ant-typography + h4.ant-typography {
      margin-top: 1.2em;
    }
    .ant-typography div + h1,.ant-typography ul + h1,.ant-typography li + h1,.ant-typography p + h1,.ant-typography h1 + h1,.ant-typography h2 + h1,.ant-typography h3 + h1,.ant-typography h4 + h1,.ant-typography div + h2,.ant-typography ul + h2,.ant-typography li + h2,.ant-typography p + h2,.ant-typography h1 + h2,.ant-typography h2 + h2,.ant-typography h3 + h2,.ant-typography h4 + h2,.ant-typography div + h3,.ant-typography ul + h3,.ant-typography li + h3,.ant-typography p + h3,.ant-typography h1 + h3,.ant-typography h2 + h3,.ant-typography h3 + h3,.ant-typography h4 + h3,.ant-typography div + h4,.ant-typography ul + h4,.ant-typography li + h4,.ant-typography p + h4,.ant-typography h1 + h4,.ant-typography h2 + h4,.ant-typography h3 + h4,.ant-typography h4 + h4 {
      margin-top: 1.2em;
    }
    span.ant-typography-ellipsis {
      display: inline-block;
    }
    .ant-typography a {
      color: #1890ff;
      text-decoration: none;
      outline: none;
      cursor: pointer;
      transition: color 0.3s;
    }
    .ant-typography a:focus,.ant-typography a:hover {
      color: #40a9ff;
    }
    .ant-typography a:active {
      color: #096dd9;
    }
    .ant-typography a:active,.ant-typography a:hover {
      text-decoration: none;
    }
    .ant-typography a[disabled] {
      color: rgba(0, 0, 0, 0.25);
      cursor: not-allowed;
      pointer-events: none;
    }
    .ant-typography code {
      margin: 0 0.2em;
      padding: 0.2em 0.4em 0.1em;
      font-size: 85%;
      background: rgba(0, 0, 0, 0.06);
      border: 1px solid rgba(0, 0, 0, 0.06);
      border-radius: 3px;
    }
    .ant-typography mark {
      padding: 0;
      background-color: #ffe58f;
    }
    .ant-typography u,.ant-typography ins {
      text-decoration: underline;
      text-decoration-skip-ink: auto;
    }
    .ant-typography s,.ant-typography del {
      text-decoration: line-through;
    }
    .ant-typography strong {
      font-weight: 600;
    }
    .ant-typography-expand,.ant-typography-edit,.ant-typography-copy {
      color: #1890ff;
      text-decoration: none;
      outline: none;
      cursor: pointer;
      transition: color 0.3s;
      margin-left: 8px;
    }
    .ant-typography-expand:focus,.ant-typography-edit:focus,.ant-typography-copy:focus,.ant-typography-expand:hover,.ant-typography-edit:hover,.ant-typography-copy:hover {
      color: #40a9ff;
    }
    .ant-typography-expand:active,.ant-typography-edit:active,.ant-typography-copy:active {
      color: #096dd9;
    }
    .ant-typography-copy-success,.ant-typography-copy-success:hover,.ant-typography-copy-success:focus {
      color: #52c41a;
    }
    .ant-typography-edit-content {
      position: relative;
    }
    div.ant-typography-edit-content {
      left: -12px;
      margin-top: -5px;
      margin-bottom: calc(1em - 4px - 2px);
    }
    .ant-typography-edit-content-confirm {
      position: absolute;
      right: 10px;
      bottom: 8px;
      color: rgba(0, 0, 0, 0.45);
      pointer-events: none;
    }
    .ant-typography-edit-content textarea {
      transition: none;
    }
    .ant-typography ul,.ant-typography ol {
      margin: 0 0 1em 0;
      padding: 0;
    }
    .ant-typography ul li,.ant-typography ol li {
      margin: 0 0 0 20px;
      padding: 0 0 0 4px;
    }
    .ant-typography ul li {
      list-style-type: circle;
    }
    .ant-typography ul li li {
      list-style-type: disc;
    }
    .ant-typography ol li {
      list-style-type: decimal;
    }
    .ant-typography-ellipsis-single-line {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
    }
    .ant-typography-ellipsis-multiple-line {
      display: -webkit-box;
      -webkit-line-clamp: 3;

      -webkit-box-orient: vertical;
      overflow: hidden;
    }
    .ant-tooltip {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      color: rgba(0, 0, 0, 0.65);
      font-size: 14px;
      font-variant: normal;
      line-height: 1.5;
      list-style: none;
      position: absolute;
      z-index: 1060;
      display: block;
      max-width: 250px;
      visibility: visible;
    }
    .ant-tooltip-hidden {
      display: none;
    }
    .ant-tooltip-placement-top,.ant-tooltip-placement-topLeft,.ant-tooltip-placement-topRight {
      padding-bottom: 8px;
    }
    .ant-tooltip-placement-right,.ant-tooltip-placement-rightTop,.ant-tooltip-placement-rightBottom {
      padding-left: 8px;
    }
    .ant-tooltip-placement-bottom,.ant-tooltip-placement-bottomLeft,.ant-tooltip-placement-bottomRight {
      padding-top: 8px;
    }
    .ant-tooltip-placement-left,.ant-tooltip-placement-leftTop,.ant-tooltip-placement-leftBottom {
      padding-right: 8px;
    }
    .ant-tooltip-inner {
      min-width: 30px;
      min-height: 32px;
      padding: 6px 8px;
      color: #fff;
      text-align: left;
      text-decoration: none;
      word-wrap: break-word;
      background-color: rgba(0, 0, 0, 0.75);
      border-radius: 4px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
    .ant-tooltip-arrow {
      position: absolute;
      display: block;
      width: 13.07106781px;
      height: 13.07106781px;
      overflow: hidden;
      background: transparent;
      pointer-events: none;
    }
    .ant-tooltip-arrow::before {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      display: block;
      width: 5px;
      height: 5px;
      margin: auto;
      background-color: rgba(0, 0, 0, 0.75);
      content: '';
      pointer-events: auto;
    }
    .ant-tooltip-placement-top .ant-tooltip-arrow,.ant-tooltip-placement-topLeft .ant-tooltip-arrow,.ant-tooltip-placement-topRight .ant-tooltip-arrow {
      bottom: -5.07106781px;
    }
    .ant-tooltip-placement-top .ant-tooltip-arrow::before,.ant-tooltip-placement-topLeft .ant-tooltip-arrow::before,.ant-tooltip-placement-topRight .ant-tooltip-arrow::before {
      box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.07);
      transform: translateY(-6.53553391px) rotate(45deg);
    }
    .ant-tooltip-placement-top .ant-tooltip-arrow {
      left: 50%;
      transform: translateX(-50%);
    }
    .ant-tooltip-placement-topLeft .ant-tooltip-arrow {
      left: 13px;
    }
    .ant-tooltip-placement-topRight .ant-tooltip-arrow {
      right: 13px;
    }
    .ant-tooltip-placement-right .ant-tooltip-arrow,.ant-tooltip-placement-rightTop .ant-tooltip-arrow,.ant-tooltip-placement-rightBottom .ant-tooltip-arrow {
      left: -5.07106781px;
    }
    .ant-tooltip-placement-right .ant-tooltip-arrow::before,.ant-tooltip-placement-rightTop .ant-tooltip-arrow::before,.ant-tooltip-placement-rightBottom .ant-tooltip-arrow::before {
      box-shadow: -3px 3px 7px rgba(0, 0, 0, 0.07);
      transform: translateX(6.53553391px) rotate(45deg);
    }
    .ant-tooltip-placement-right .ant-tooltip-arrow {
      top: 50%;
      transform: translateY(-50%);
    }
    .ant-tooltip-placement-rightTop .ant-tooltip-arrow {
      top: 5px;
    }
    .ant-tooltip-placement-rightBottom .ant-tooltip-arrow {
      bottom: 5px;
    }
    .ant-tooltip-placement-left .ant-tooltip-arrow,.ant-tooltip-placement-leftTop .ant-tooltip-arrow,.ant-tooltip-placement-leftBottom .ant-tooltip-arrow {
      right: -5.07106781px;
    }
    .ant-tooltip-placement-left .ant-tooltip-arrow::before,.ant-tooltip-placement-leftTop .ant-tooltip-arrow::before,.ant-tooltip-placement-leftBottom .ant-tooltip-arrow::before {
      box-shadow: 3px -3px 7px rgba(0, 0, 0, 0.07);
      transform: translateX(-6.53553391px) rotate(45deg);
    }
    .ant-tooltip-placement-left .ant-tooltip-arrow {
      top: 50%;
      transform: translateY(-50%);
    }
    .ant-tooltip-placement-leftTop .ant-tooltip-arrow {
      top: 5px;
    }
    .ant-tooltip-placement-leftBottom .ant-tooltip-arrow {
      bottom: 5px;
    }
    .ant-tooltip-placement-bottom .ant-tooltip-arrow,.ant-tooltip-placement-bottomLeft .ant-tooltip-arrow,.ant-tooltip-placement-bottomRight .ant-tooltip-arrow {
      top: -5.07106781px;
    }
    .ant-tooltip-placement-bottom .ant-tooltip-arrow::before,.ant-tooltip-placement-bottomLeft .ant-tooltip-arrow::before,.ant-tooltip-placement-bottomRight .ant-tooltip-arrow::before {
      box-shadow: -3px -3px 7px rgba(0, 0, 0, 0.07);
      transform: translateY(6.53553391px) rotate(45deg);
    }
    .ant-tooltip-placement-bottom .ant-tooltip-arrow {
      left: 50%;
      transform: translateX(-50%);
    }
    .ant-tooltip-placement-bottomLeft .ant-tooltip-arrow {
      left: 13px;
    }
    .ant-tooltip-placement-bottomRight .ant-tooltip-arrow {
      right: 13px;
    }
    .login-page {
      height: 100vh;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    .ant-card.card-reset-password {
      border-radius: .5em;
      box-shadow: #8080807d 0px 0px 30px;
      width: 400px;
    }
    .forget-password-text:hover{
      text-decoration: underline;
    }
    .login-page .row-login {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70%; /* Atur lebar card sesuai kebutuhan */
        max-width: 430px; /* Maksimum lebar card */
    }

    .card-login {
        box-shadow: #777B7E7d 0px 0px 15px;
        width: 100%; /* Memastikan card mengisi lebar kontainer */
        padding: 0px; /* Tambahkan padding jika diperlukan */
        background: white; /* Pastikan card memiliki latar belakang */
    }
    .header-login {
      padding: 15px;
      background: white;
    
    }
    .header-login .content-header-login {
      display: flex;
      flex-direction: column;
      align-items: center; /* Pusatkan secara horizontal */
      padding: 0px;
      padding-bottom:0px;
      margin-top:10px;
    }
    .header-login .text-header {
      text-align: center; /* Pusatkan teks */
      margin: 10px 0; /* Jarak atas dan bawah */
      
    }
    .logo-container {
      padding-top: 20px;
            display: flex;
            justify-content: center; /* Pusatkan logo */
            padding-bottom: 5px; /* Jarak bawah logo */}
    .body-login {
      padding: 16px;
      padding-top:0px;
      background: white;
    }
    .header-login h2, .header-login p, .header-login h3 {
      color: black; 
      font-weight:900;
    }
    /* Alert styles */
    .alert {
      padding: 15px 35px 15px 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px;
      position: relative;
    }

    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1;
    }

    .alert-warning {
      color: #8a6d3b;
      background-color: #fcf8e3;
      border-color: #faebcc;
    }

    .alert-success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6;
    }

    .alert-info {
      color: #31708f;
      background-color: #d9edf7;
      border-color: #bce8f1;
    }

    .alert-dismissible .close {
      position: absolute;
      top: 0;
      right: 0;
      padding: 15px;
      color: inherit;
      background-color: transparent;
      border: none;
      font-size: 21px;
      font-weight: bold;
      line-height: 1;
      opacity: 0.5;
      text-shadow: 0 1px 0 #fff;
      cursor: pointer;
    }

    .alert-dismissible .close:hover,
    .alert-dismissible .close:focus {
      color: inherit;
      text-decoration: none;
      cursor: pointer;
      opacity: 0.9;
    }
    .forget-password-text {
    /* color: rgb(24, 144, 255); */
    font-size: 1rem;
    margin-top: 0.5rem;
    }

    .contact-admin {
      color: rgb(24, 144, 255);
      font-size: 1rem;
      margin-top: 0rem;
      cursor: pointer;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-page">
    <div class="ant-row row-login">
      <div class="ant-card card-login">
        <div class="ant-card-body">
          <div class="header-login"">
            <div class="content-header-login">
                <div class="logo-container">
                    <img src="assets/logo.png" height="100px" alt="login-icon">
                </div>
                <div class="text-header">
                    <h3 style="margin-top:0px; font-size: 15px;"><b>SMAN 13 BONE</b></h3>
                    <h3 style="font-size: 15px;"><b>SISTEM PENDUKUNG KEPUTUSAN</b></h3>
                </div>
            </div>
          </div>
          <div class="body-login">
            <form class="ant-form ant-form-horizontal form-input-siaunhas" action="?act=login" method="post">
              <?php if ($_POST) include 'aksi.php'; ?>
              <div class="ant-row ant-form-item">
                <div class="ant-col ant-form-item-control-wrapper">
                  <div class="ant-form-item-control has-success">
                    <span class="ant-form-item-children">
                      <b>Username</b>
                      <input placeholder="Username" type="text" id="inputEmail" data-__meta="[object Object]" data-__field="[object Object]" class="ant-input ant-input-lg" name="user">
                    </span>
                  </div>
                </div>
              </div>
              <div class="ant-row ant-form-item">
                <div class="ant-col ant-form-item-control-wrapper">
                  <div class="ant-form-item-control has-success">
                    <span class="ant-form-item-children">
                      <b>Password</b>
                      <span class="ant-input-password ant-input-password-large ant-input-affix-wrapper ant-input-affix-wrapper-lg">
                        
                        <input type="password" placeholder="Password" id="inputPassword" class="ant-input ant-input-lg" name="pass">
                        <span class="ant-input-suffix">
                          <i aria-label="icon: eye-invisible" tabindex="-1" class="anticon anticon-eye-invisible ant-input-password-icon" id="togglePasswordVisibility">
                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="eye-invisible" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                              <path d="M942.2 486.2Q889.47 375.11 816.7 305l-50.88 50.88C807.31 395.53 843.45 447.4 874.7 512 791.5 684.2 673.4 766 512 766q-72.67 0-133.87-22.38L323 798.75Q408 838 512 838q288.3 0 430.2-300.3a60.29 60.29 0 0 0 0-51.5zm-63.57-320.64L836 122.88a8 8 0 0 0-11.32 0L715.31 232.2Q624.86 186 512 186q-288.3 0-430.2 300.3a60.3 60.3 0 0 0 0 51.5q56.69 119.4 136.5 191.41L112.48 835a8 8 0 0 0 0 11.31L155.17 889a8 8 0 0 0 11.31 0l712.15-712.12a8 8 0 0 0 0-11.32zM149.3 512C232.6 339.8 350.7 258 512 258c54.54 0 104.13 9.36 149.12 28.39l-70.3 70.3a176 176 0 0 0-238.13 238.13l-83.42 83.42C223.1 637.49 183.3 582.28 149.3 512zm246.7 0a112.11 112.11 0 0 1 146.2-106.69L401.31 546.2A112 112 0 0 1 396 512z"></path>
                              <path d="M508 624c-3.46 0-6.87-.16-10.25-.47l-52.82 52.82a176.09 176.09 0 0 0 227.42-227.42l-52.82 52.82c.31 3.38.47 6.79.47 10.25a111.94 111.94 0 0 1-112 112z"></path>
                            </svg>
                          </i>
                        </span>
                      </span>
                    </span>
                  </div>
                </div>
              </div>
              <script type="text/javascript">
                $('ant-input-lg').attr('autocomplete', 'off');
              </script>
              <script>
                const passwordInput = document.getElementById('inputPassword');
                const togglePasswordVisibility = document.getElementById('togglePasswordVisibility');
                let passwordVisible = false;

                togglePasswordVisibility.addEventListener('click', () => {
                  passwordVisible = !passwordVisible;
                  if (passwordVisible) {
                    passwordInput.type = 'text';
                    togglePasswordVisibility.classList.remove('anticon-eye-invisible');
                    togglePasswordVisibility.classList.add('anticon-eye');
                  } else {
                    passwordInput.type = 'password';
                    togglePasswordVisibility.classList.remove('anticon-eye');
                    togglePasswordVisibility.classList.add('anticon-eye-invisible');
                  }
                });
              </script>
              <div class="ant-row ant-form-item">
                <div class="ant-col ant-form-item-control-wrapper">
                  <div class="ant-form-item-control">
                    <span class="ant-form-item-children">
                      <button type="submit" class ="ant-input ant-input-lg" style = "background-color: #1890ff; color:#ffffff; margin-top:10px;"><span>Sign In</span></button>
                      <div style="display: grid; place-items: center;">
                          <span style="font-size: 12px; padding: 5px 0 0 0;">
                              Lupa password atau terjadi kendala saat login?
                          </span>
                          <a href="https://wa.me/6285796754530" target="_blank" class="contact-admin" style="font-size: 12px; margin-top: 0; margin-bottom: 0;">
                              Hubungi admin
                          </a>
                      </div>
                    </span>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>